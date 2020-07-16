import pickle
from pathlib import Path
import os

package_directory = os.path.dirname(os.path.abspath(__file__))

def full_text(lang):
    """
    :param lang: language (i.e., de, el, en, fr, hi, jp, pt, se, ur)
    :return: a list of tuples (id, sentence_string) of the particular language
    """
    pickled_file = f"{package_directory}/full_text_data/ted_{lang}_ids_sents.pkl"
    assert Path(pickled_file).is_file()

    ids, sents = pickle.load(open(pickled_file, 'rb'))
    assert len(ids) == len(sents)
    return list(zip(ids, sents))


print(full_text('en'))