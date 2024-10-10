
import logging
import difflib
from menu import Menu, MenuChoice
from typing import Generator


logger = logging.getLogger("alumix")


FILTERS = {
    "it": {"menu": ["Primi piatti"], "extras": ["Coperto"]},
    "de": {"menu": ["Warme Vorspeisen"], "extras": ["Gedeck"]}
}

WEEKDAYS = {
    0: ["lunedi",    "montag",     "monday"],
    1: ["martedi",   "dienstag",   "tuesday"],
    2: ["mercoledi", "mittwoch",   "wednesday"],
    3: ["giovedi",   "donnerstag", "thursday"],
    4: ["venerdi",   "freitag",    "friday"],
    5: ["sabato",    "samstag",    "saturday"],
    6: ["domenica",  "sonntag",    "sunday"],
}


def get_weekday(name: str) -> tuple[int, float]:

    weekdays = {name.lower(): id for id, names in WEEKDAYS.items() for name in names}

    matches = {test: difflib.SequenceMatcher(None, name.lower(), test).quick_ratio() for test in weekdays}

    found, similarity = max(matches.items(), key=lambda i:i[1])

    return weekdays[found], similarity

def filter_menu_lang(data: list[dict[str, list[MenuChoice]]], key: str, lang: str) -> Generator[dict, None, None]:

    for item in data:

        if set(FILTERS[lang][key]) - set(item):
            continue

        yield item

def filter_menu(menu: Menu, lang: str) -> None:
    """filter the menu my a given language"""

    logger.debug("Filtering menu by language %r", lang)

    menu.menu = list(filter_menu_lang(menu.menu, "menu", lang))
    menu.extras = list(filter_menu_lang(menu.extras, "extras", lang))
