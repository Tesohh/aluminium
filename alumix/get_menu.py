
import requests
import datetime

from parser import parse_menu


xxx = 999

def import_menu(filename: str):
    with open(filename, "rb") as fp:
        return parse_menu(fp.read())

def request_menu(url: str, cache: bool, prefix: str):

    with requests.get(url) as response:
        content = response.content

    cache_filename = "%smenu_of_%s" % (prefix, datetime.date.today())

    if cache:
        with open(cache_filename, "wb") as fp:
            fp.write(content)

    return parse_menu(content)

def get_menu_of(): ...

