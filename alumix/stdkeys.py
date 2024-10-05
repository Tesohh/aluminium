
import logging


logger = logging.getLogger("alumix")


def wrap_dict(d: dict, *, keyname: str = "key", valname: str = "value") -> list:
    """
    wrap a dictionary key and value
    `{<key>: <value>}` -> `{"key": <key>, "value": <value>}`
    """

    return [{keyname: key,
             valname: value} for key, value in d.items()]

def standardize_keys(menu: list[dict]) -> list[list]:

    logger.debug("Standardizing keys")

    return [wrap_dict(item) for item in menu]

