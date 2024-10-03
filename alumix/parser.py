
from __future__ import annotations

import bs4
from dataclasses import dataclass
import logging

logger = logging.getLogger("alumix")

@dataclass
class MenuChoice:
    name:        str
    price:       float | None
    description: str | None
    ingredients: str | None

    @classmethod
    def empty(cls) -> MenuChoice:
        return MenuChoice(name="",
                          price=None,
                          description=None,
                          ingredients=None)

    def as_json(self):
        return {"name": self.name,
                "price": self.price,
                "description": self.description,
                "ingredients": self.ingredients}

def find_deepest_node(tag: bs4.Tag, *, cur_depth: int = 0) -> tuple[bs4.Tag, int]:
    """find the deepest children node of a tag"""

    result = [find_deepest_node(child, cur_depth=cur_depth + 1) for child in tag if isinstance(child, bs4.Tag)]

    if not result:
        return tag, cur_depth

    return max(result, key=lambda t: t[1])

def parse_menu_title(div: bs4.Tag) -> str:
    """parse a div containing the menu title"""
    return str(div.find("strong").contents[0])

def parse_menu_plate(div: bs4.Tag) -> MenuChoice:
    """parse a div containing a menu plate"""

    return MenuChoice(name=str(div.find("h3").contents[0]),
                      price=float(str(div.find("strong").contents[0]).replace(",", ".")),
                      description=None,
                      ingredients=None if (h5 := div.find("h5")) is None else str(h5.contents[0]))

def parse_menu_div(div: bs4.Tag) -> tuple[str, MenuChoice]:
    """parse a div containing a title or a menu plate"""

    if "sfCat" in div.attrs.get("class", []):
        return parse_menu_title(div), MenuChoice.empty()

    else:
        return "", parse_menu_plate(div)

def parse_table_row(tr: bs4.Tag) -> tuple[str, str]:
    """parse a tr tag, returning the table values"""

    key, value = tr.find_all("td")

    return (str(find_deepest_node(key)[0].contents[0]),
            str(find_deepest_node(value)[0].contents[0]))

def parse_ul(ul: bs4.Tag) -> dict[str, list[MenuChoice]]:
    """parse a entire menu returning a dict containing for each category the title and plates"""

    fields: dict[str, list[MenuChoice]] = {}
    last_title = None

    for li in ul.find_all("li", recursive=False):

        assert isinstance(li, bs4.Tag), "not implemented yet!"

        children = li.find("div")

        assert isinstance(children, bs4.Tag), "not implemented yet!"

        title, content = parse_menu_div(children)

        if title:
            fields[title] = []
            last_title = title

        else:
            assert last_title is not None

            fields[last_title].append(content)

    return fields

def parse_menu(html: str | bytes) -> dict:
    """parse the menu and extra data in a html file"""

    logger.debug("Parsing html data")

    soup = bs4.BeautifulSoup(html, "html.parser")

    result: dict[str, list] = {}

    for ul in soup.find_all("ul", {"class": ["nav", "nav-pills", "nav-stacked"]}):

        assert isinstance(ul, bs4.Tag), "not implemented yet!"

        if ul.find_all("h3", {"class": "coTex"}):
            ## is a menu table
            result.setdefault("menu", []).append(parse_ul(ul))

        else:
            ## extra data
            result.setdefault("extras", []).append(parse_table_row(ul.find("tr")))

    return result

