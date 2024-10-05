
from __future__ import annotations

from dataclasses import dataclass
from datetime import date
from enum import StrEnum

from stdkeys import standardize_keys


class GetMode(StrEnum):
    IMPORTED = "imported" # imported from a local file
    FETCHED  = "fetched"  # fetched from the site
    CACHED   = "cached"   # imported from a local cache
    GUESSED  = "guessed"  # guessed

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

@dataclass
class Menu:
    date: date | None
    get_mode: GetMode | None
    menu: list[dict[str, list[MenuChoice]]]
    extras: list[dict]

    def as_json(self, *, stdkeys: bool = False) -> dict:

        return {"date":   str(self.date) if isinstance(self.date, str) else None,
                "mode":   self.get_mode,
                "menu":   standardize_keys(self.menu) if stdkeys else self.menu,
                "extras": standardize_keys(self.extras) if stdkeys else self.extras}


