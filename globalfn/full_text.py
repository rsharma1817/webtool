import pickle
from pathlib import Path
import os
from flair.data import Sentence

package_directory = os.path.dirname(os.path.abspath(__file__))

def full_text(lang, tokenized=False, unzip=False):
    """
    :param lang: language (i.e., de, el, en, fr, hi, jp, pt, se, ur)
    :return: a list of tuples (id, sentence_string) of the particular language
    """
    pickled_file = f"{package_directory}/full_text_data/ted_{lang}_ids_sents.pkl"
    assert Path(pickled_file).is_file()

    ids, sents = pickle.load(open(pickled_file, 'rb'))

    # fix error
    if lang == 'en':
        for i in range(len(ids)):
            if ids[i] == 1152:
                sents[i] = "They're the people who come out the top."

            if ids[i] == 1272:
                sents[i] = "By the way -- we may not see this future, but they will."

    # tokenized
    if tokenized:
        for i, sent in enumerate(sents):
            sents[i] = Sentence(sent, use_tokenizer=True).to_tokenized_string()

    assert len(ids) == len(sents)
    if not unzip:
        return list(zip(ids, sents))
    else:
        return list(ids), list(sents)
