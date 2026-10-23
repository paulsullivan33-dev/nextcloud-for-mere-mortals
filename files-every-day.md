# Files Every Day

**Scope:** daily life in the Files app —
getting things in and out, the shape of
a home folder, and the two safety nets,
versions and the trashbin, that the lab
proved from the command line.

## The room you'll live in

The Files app is a filing cabinet with a
web page for a door: folders down the
middle, upload by button or by dragging
a file onto the window, download by
clicking, the usual rename/move/delete.
Nothing about it needs a manual, and
this chapter doesn't pretend otherwise.
What deserves ink is what's underneath
the gestures.

**Uploads land as ordinary files.** The
recipe the lab put up over WebDAV sits
in the data folder as
`data/ruth/files/pancake-recipe.txt` —
no database wrapper, no encoding, the
same bytes (`sha256` equal, t02). This
is the most reassuring property
Nextcloud has: your exit is a folder
copy, and chapter 11's backup is one
too. It cuts both ways — anyone with
the *server's* disk can read the files,
so the server's own security is the
files' security (chapter 1's plain
sentence about encryption).

**The index must agree.** The web page
doesn't list the disk; it lists the
database's index *of* the disk. Files
that arrive through Nextcloud — web,
app, or WebDAV — are indexed as they
land. Files copied in by hand at the
shell are strangers until
`occ files:scan` introduces them
(chapter 15). Live in the doors and
this never matters.

## Versions: the old selves

Overwrite a file and the previous
content is not thrown away — the
versions app keeps it, stamped with the
minute it was displaced. The lab proved
the whole chain from outside (t06): a
changed recipe went up (204), the
versions door listed two stored selves,
and the disk showed
`files_versions/pancake-recipe.txt.v…`
holding the original. In the web page,
a file's **Details → Versions** restores
one in a click.

Honest edges: versions are kept on a
schedule that thins them as they age
and yields when space is tight, so a
version is a safety net, not an archive.
`occ versions:expire` and
`versions:cleanup` are the pruning
commands — and, a detail the lab learned
by asking, there is no `occ versions:list`;
the list lives at the WebDAV door (t06)
and in the web page.

## The trashbin: deletion is a move

Delete is not destruction; it's a move
to the trashbin, from which the file
restores in a click. The lab deleted the
recipe and went looking (t06): the live
address answered 404, the trashbin door
listed `pancake-recipe.txt.d…`, and the
disk showed the file resting in
`files_trashbin/files/` — **with its old
version filed beside it** in
`files_trashbin/versions/`, so restoring
the file restores its history too. Trash
expires on its own schedule (thirty
days by default, sooner if the disk
begs), and emptying it is the deliberate
act the word "delete" used to mean.

Between versions and trash, most
household disasters — the overwritten
budget, the vanished folder — are
annoyances instead of losses. What they
don't cover is the disk itself dying or
the whole server going wrong at once.
That's chapter 11, and it's why this
guide keeps saying sync is not backup.

## Small daily graces

- **Favourites and tags** pin the three
  files you actually open to the top of
  your attention, whatever folder they
  live in.
- **Search** covers names instantly and,
  with the full-text search app, content
  — an app-store extra, labelled as such
  wherever this guide mentions it.
- **The activity stream** (the Activity
  app, shipped enabled) is the household
  diary: who shared what, who changed
  what, when. When something looks
  wrong, it is the first page to open.
- **Storage quotas** per user are an
  admin setting (chapter 9); the lab's
  two accounts ran unquota'd, as a
  two-person household sensibly does.

Check: you can put a file in three ways,
find it on the server's disk with your
own eyes, restore yesterday's version
of it, and fish it out of the trash.
Chapter 6 goes through the door the
lab actually used — the one every
client knocks on.
