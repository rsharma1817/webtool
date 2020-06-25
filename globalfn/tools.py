# -*- coding: utf-8 -*-
"""
Created on May 31, 2020
@author: yongzhengxin
"""
from globalfn.full_text import full_text

LANGUAGES = ['de', 'el', 'en', 'fr', 'hi', 'jp', 'pt', 'se', 'ur']

def get_lang(ID):
    """
    :param ID: sentence ID
    :return: language of the sentence (e.g., "en", "de", etc.)
    """
    for lang in LANGUAGES:
        IDs, _ = full_text(lang)
        if ID in IDs:
            return lang
    raise AssertionError