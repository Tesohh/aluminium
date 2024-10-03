
import logging
from typing import Generator


logger = logging.getLogger("alumix")


def wrap_dict(d: dict, *, keyname: str = "key", valname: str = "value") -> list:
    """
    wrap a dictionary key and value
    `{<key>: <value>}` -> `{"key": <key>, "value": <value>}`
    """

    return [{keyname: key,
             valname: value} for key, value in d.items()]

def standardize_keys(menu: dict) -> Generator[tuple, None, None]:

    logger.debug("Standardizing keys")

    for key, value in menu.items():

        for item in value:

            if isinstance(item, dict):
                yield key, wrap_dict(item)

            else:
                yield key, item

