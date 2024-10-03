import asyncio
import bs4
import certifi
import aiohttp
import os
from bs4 import BeautifulSoup


class RawMenuGetter:

    @staticmethod
    async def from_url(url: str) -> str:
        async with aiohttp.ClientSession() as session:
            async with session.get(url) as response:
                return await response.text()

    @staticmethod
    async def from_file(filename: str) -> str:
        with open(filename) as fp:
            return fp.read()

def price_to_float(price: str) -> float:
    return float(price.replace(",", "."))

def parse_menu(html: str) -> dict[str, dict[str, float]] | None:

    bs = BeautifulSoup(html, "html.parser")

    if not (menu_tag := bs.find("ul", class_="nav-pills")):
        return None

    assert isinstance(menu_tag, bs4.Tag) # for VSCODE type checking

    menu = {}
    last_title = None

    for table in menu_tag.find_all("table", width="100%"):

        assert isinstance(table, bs4.Tag) # for VSCODE type checking

        table_entry = table.find_all("h3")

        if len(table_entry) == 1: # title
            last_title = table_entry[0].text.strip()
            menu[last_title] = {}

        if len(table_entry) == 2: # piatto + price
            name, price = table_entry

            menu[last_title][name.text.replace("\n", "").replace("  ", "")] = price_to_float(price.text)

    return menu

async def main():
    # os.environ["SSL_CERT_FILE"] = certifi.where()
    # html = await get_menu("https://go.alumix.it/menu/alumix/index.php")

    html = await RawMenuGetter.from_file("samples/menu.php")

    import json

    m = parse_menu(html)

    print(json.dumps(m, indent=4))



if __name__ == "__main__":
    asyncio.run(main())
