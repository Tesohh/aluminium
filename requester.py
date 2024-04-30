import asyncio
import bs4
import certifi
import aiohttp
import os
from bs4 import BeautifulSoup


async def get_menu(url: str) -> str:
    async with aiohttp.ClientSession() as session:
        async with session.get(url) as response:
            return await response.text()


def parse_menu(html: str) -> str | None:
    bs = BeautifulSoup(html, "html.parser")
    if not (menu := bs.find("ul", class_="nav-pills")):
        return None
    assert isinstance(menu, bs4.Tag)
    return menu.prettify()


async def main():
    os.environ["SSL_CERT_FILE"] = certifi.where()
    html = await get_menu("https://go.alumix.it/menu/alumix/index.php")
    print(parse_menu(html))


if __name__ == "__main__":
    asyncio.run(main())
