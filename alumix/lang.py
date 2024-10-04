
import logging
import difflib

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

def filter_key(data: dict, key: str, lang: str) -> list:

    if not key in FILTERS[lang]:
        return data[key]

    res = []

    for menu_item in data[key]:

        if set(FILTERS[lang][key]) - set(menu_item):
            continue

        res.append(menu_item)

    return res

def filter_menu(menu: dict, lang: str) -> dict:

    logger.debug("Filtering menu by language %r", lang)

    return {key: filter_key(menu, key, lang) for key in menu}
