
import logging

logger = logging.getLogger("alumix")


FILTERS = {
    "it": {"menu": ["Primi piatti"], "extras": ["Coperto"]},
    "de": {"menu": ["Warme Vorspeisen"], "extras": ["Gedeck"]}
}


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
