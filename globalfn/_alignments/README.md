# Sentence Alignment

### How to Extract Alignments
1. Download each sheet from
https://docs.google.com/spreadsheets/d/1Hva4w8WdMnU-09n4LxtjGVsC6_fZbuSMfYZwIOXRXaU/edit#gid=1958176769 as a tsv file into the `files/` folder.
2. (If necessary, make changes to the tsv files as there are inconsistencies with annotations)
3. Run the `extract(tsv_file)` function in the `sentence_alignment.py`.
4. The list of two dictionaries that map sentence alignments are stored in the `pickled/` folder.
5. Run the `load_alignments(pickled_filename)` function to retrieve the alignments.

The alignments are stored as a list of two dictionaries.
- The first dictionary stores the alignment from English to a foreign language.
- The second dictionary stores the alignment from a foreign language to English.
- For one-to-many and many-to-one relations, the key is the sentence ID in string and the value is a list of aligned sentence IDs.
- For many-to-many relations, the key is a tuple of sentence IDs and the value is a list of tuples that store the multiple aligned sentences.


