
import requests
import datetime
import time
import os
import re
import logging

logger = logging.getLogger("alumix")

from parser import parse_menu
from lang import get_weekday

SECS_PER_DAY = 86_400
CACHED_MENU_PATTERN = r"(.+)?menu_of_(\d+-\d+-\d+).(?:html)|(?:php)"


def parse_date(date: str) -> datetime.date:

    match date.lower():

        case "today" | "oggi" | "heute":
            return datetime.date.today()

        case "yesterday" | "ieri" | "gestern":
            return datetime.date.fromtimestamp(time.time() - SECS_PER_DAY)

        case "tomorrow" | "domani" | "morgen":
            return datetime.date.fromtimestamp(time.time() + SECS_PER_DAY)

        case default:

            weekday, prob = get_weekday(default)

            if prob < 0.2:
                return datetime.date.fromisoformat(default)

            delta_day = datetime.date.today().weekday() - weekday

            return datetime.date.fromtimestamp(time.time() - SECS_PER_DAY * delta_day)


def get_menu_filename(prefix: str, date: datetime.date, cache_dir: str = ".cache/") -> str:
    return os.path.join(cache_dir, "%smenu_of_%s.html" % (prefix, date))

def find_menu_of_weekday(weekday: int, cache_dir: str, prefix: str = "") -> str | None:
    ## TODO: ORDINARE DAL PIU RECENTE

    if not os.path.exists(cache_dir):
        return None

    for filename in os.listdir(cache_dir):

        if not (match := re.search(CACHED_MENU_PATTERN, filename)):
            continue

        if match.group(1) != prefix:
            continue

        if parse_date(match.group(2)).weekday() == weekday:
            return os.path.join(cache_dir, filename)

def import_menu(filename: str):

    logger.info("Importing menu from file %r", filename)

    with open(filename, "rb") as fp:
        return parse_menu(fp.read())

def download_menu(url: str, *, cache_file: str | None = None):

    logger.info("Downloading menu from url %r", url)

    with requests.get(url) as response:
        response.raise_for_status()

        content = response.content

    if cache_file is not None:

        logger.info("Caching menu to %r", cache_file)

        os.makedirs(os.path.dirname(cache_file), exist_ok=True)

        with open(cache_file, "wb") as fp:
            fp.write(content)

    return parse_menu(content)

def get_menu_of(date: str | datetime.date, *, guess: bool = False, prefix: str = "", cache_dir: str | None = None, download_url: str, fetch: bool = False):

    if cache_dir is None:
        return download_menu(url        = download_url,
                             cache_file = None)

    if isinstance(date, str):
        date = parse_date(date)

    cache_filename = get_menu_filename(prefix, date, cache_dir)

    if os.path.exists(cache_filename) and not fetch:
        ## there is a cached file (perfect!)
        return import_menu(cache_filename)

    if date == datetime.date.today():
        ## the menu can be downloaded
        return download_menu(url        = download_url,
                             cache_file = cache_filename)

    if not guess:
        ## the menu is not found and can't be download nor guessed
        return None

    logger.info("Guessing menu file for date %s", date)

    filename = find_menu_of_weekday(date.weekday(), cache_dir, prefix)

    if filename is None:
        logger.error("Guess failed")
        ## unable to guess the menu
        return None

    logger.info("Guess succeeded: filename=%r", filename)

    return import_menu(filename)

