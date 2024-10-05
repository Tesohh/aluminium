
import os
import enum
from dataclasses import dataclass
from menu import Menu

class Theme(enum.StrEnum):
    LIGHT = "light"
    DARK  = "dark"
    NONE  = "none"

@dataclass(frozen=True, slots=True)
class ThemeColors:
    reset: str
    price: str
    title: str
    plate: str

COLORS = {
    Theme.LIGHT: ThemeColors("\033[0m", "\033[1m", "\033[41;1m", "\033[7m"),
    Theme.DARK:  ThemeColors("\033[0m", "\033[1m", "\033[31;1m", ""),
    Theme.NONE:  ThemeColors("", "", "", ""),
}

TITLE_TEMPLATE = "{color}{before}{title}{after}{reset}"
PLATE_TEMPLATE = "{plate_color}{plate}{price_color}{price}{reset}"


def splittext(text: str, max_len: int) -> list[str]:

    lines = []

    for word in text.split():

        if not lines:
            lines.append(word)
            continue

        if len(lines[-1]) + len(word) + 1 < max_len:
            lines[-1] += " " + word

        else:
            lines.append(word)

    return lines

def format_choice(text: str, price: float, width: int, border: int = 0) -> tuple[str, str]:

    price_str = ("%.2f" % price).replace(".", ",")

    lines = [line.ljust(width) for line in splittext(text, width * 2 // 3)]

    lines[-1] = lines[-1][:-len(price_str)]

    return "\n".join(lines), price_str

def print_menu(menu: Menu, *, theme: Theme = Theme.NONE, size: tuple[int, int] | None = None) -> None:

    width, height = (size or os.get_terminal_size())

    colors = COLORS[theme]

    for menu_entry in menu.menu:

        for category, choices in menu_entry.items():

            print(TITLE_TEMPLATE.format(color  = colors.title,
                                        before = "".center(width),
                                        title  = category.center(width),
                                        after  = "".center(width),
                                        reset  = colors.reset))

            for plate in choices:
                plate_fmt, price_fmt = format_choice(plate.name, plate.price, width)

                print(PLATE_TEMPLATE.format(plate_color = colors.plate,
                                            plate       = plate_fmt,
                                            price_color = colors.price,
                                            price       = price_fmt,
                                            reset       = colors.reset))

