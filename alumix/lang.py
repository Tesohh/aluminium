

FILTERS = {
    "it": {"menu": ["Primi piatti"], "extras": ["Coperto"]},
    "de": {"menu": ["Warme Vorspeisen"], "extras": ["Gedeck"]}
}

def filter_key(data: dict, key: str, lang: str) -> dict:

    if not key in FILTERS[lang]:
        return data[key]

    for menu_item in data[key]:

        if set(FILTERS[lang][key]) - set(menu_item):
            continue

        return menu_item

    raise

def filter_menu(menu: dict, lang: str) -> dict:
    return {key: filter_key(menu, key, lang) for key in menu}
