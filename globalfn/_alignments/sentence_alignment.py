# -*- coding: utf-8 -*-
"""
Created on May 18, 2020
@author: yongzhengxin
"""
import csv
import collections
import pickle
import pathlib

def extract(tsv_file):
    res_source_dest = collections.defaultdict(list)
    res_dest_source = collections.defaultdict(list)
    prev_source = prev_dest = None
    with open(tsv_file, 'r') as rf:
        reader = csv.reader(rf, delimiter='\t')
        next(reader)
        for r in reader:
            # print(r)
            if not (r[0] or r[1] or r[2] or r[3]):
                continue
            if r[0].isdigit() and r[1] and r[2].isdigit() and r[3]:
                res_source_dest[int(r[0])].append(int(r[2]))
                res_dest_source[int(r[2])].append(int(r[0]))
                prev_source = r[0]
                prev_dest = r[2]
            elif not r[0] and not r[1] and r[2].isdigit() and r[3]:
                # empty source: one-to-many relation
                res_source_dest[int(prev_source)].append(int(r[2]))
                res_dest_source[int(r[2])].append(int(prev_source))
                prev_dest = r[2]
            elif not r[2] and not r[3] and r[0].isdigit() and r[1]:
                # empty dest: many-to-one relation
                res_source_dest[int(r[0])].append(int(prev_dest))
                res_dest_source[int(prev_dest)].append(int(r[0]))
                prev_source = r[0]
            elif " " in r[0] and " " in r[2]:
                # many-to-many relation
                # e.g., ['1066 1067', "Mel Gibson did the sequel, you may have seen it. Nativity II.'",
                #        '798 799', "Mel Gibson fez a sequência. Talvez vocês tenham visto: 'Natal 2'."]'
                res_source_dest[tuple(map(int, r[0].split()))].extend(list(map(int, r[2].split())))
                res_dest_source[tuple(map(int, r[2].split()))].extend(list(map(int, r[0].split())))
            elif (not r[0] and r[1]) or (not r[2] and r[3]):
                # no translation
                continue
            else:
                # Error (need to fix the tsv manually or add more extraction rules)
                print(r)

    pickle.dump([res_source_dest, res_dest_source], open(f'pickled/{pathlib.Path(tsv_file).stem}.pkl', 'wb'))


def load_alignments(pickled_filename):
    print(f"{pathlib.Path(pickled_filename).stem}...")
    aligned_source_dest, aligned_dest_source = pickle.load(open(pickled_filename, 'rb'))
    return aligned_source_dest, aligned_dest_source

# extract("files/EN-DE.tsv")
# extract("files/EN-EL.tsv")
# extract("files/EN-PT.tsv")
# extract("files/EN-SE.tsv")
# load_alignments("pickled/EN-SE.pkl")