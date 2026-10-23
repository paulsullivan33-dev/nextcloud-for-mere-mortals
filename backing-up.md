# Backing Up

**Scope:** the backup that actually
restores a Nextcloud — a database dump
and the data folder, taken together —
and this lab's unplanned demonstration
of why both halves matter.

## The parable first

Midway through this guide's build, the
lab machine rebooted and its system
disk came back as a factory image. The
database — a week of nothing, but the
lab's whole world: two accounts, their
shares, the file index — was simply
gone. And the data folder, kept on a
different disk, was untouched: the
uploaded notes, the trashed recipe and
its kept old version, all sitting in
their ordinary folders, readable by
anybody who cared to look (the fossils
are itemised in the lab notes).

The lab rebuilt and re-ran everything.
A household doesn't get to re-run its
photographs. The lesson is the chapter:
**a Nextcloud is two things — a folder
of files and a database that knows what
they mean — and a backup is both.**

- Folder without database: your files
  survive (they're ordinary files), but
  the server is dead: accounts, shares,
  versions' bookkeeping, calendars, all
  to be rebuilt or mourned.
- Database without folder: a perfect
  catalogue of files that no longer
  exist. The lab's dump literally
  contains the recipe's name; a name is
  not a recipe (t07).

## The backup, in order

The project's documented procedure,
which the lab's components were each
exercised against:

1. **Freeze.** `occ maintenance:mode --on`,
   so no upload lands between the two
   halves and desynchronises them.
2. **Dump the database.** One command —
   `mysqldump --single-transaction
   nextcloud > nextcloud.sql` for
   MariaDB. The lab's dump of a nearly
   empty server was under a megabyte,
   held 138 tables, and contained both
   fixture filenames when opened (t07).
   On a PostgreSQL server the tool is
   `pg_dump`; on SQLite, the database
   is a file inside the data folder
   and rides along with it.
3. **Copy the data folder** — and the
   `config/` folder with it, since
   `config.php` holds the instance's
   identity and its secrets. The copy
   is of ordinary files; rsync, a tar
   file, or your usual backup tool all
   serve, and chapter 5's property —
   the files are just files — is what
   makes it so.
4. **Unfreeze.** `occ maintenance:mode --off`.
5. **Keep the result somewhere else.**
   A backup on the same disk is a
   souvenir. Another machine, a drive
   that lives in a drawer, a friend's
   shelf — geography is the feature.

## Restoring, honestly labelled

The lab did **not** rehearse a restore,
and this guide won't pretend otherwise.
The documented shape is the backup read
backwards: new server of the same
version, maintenance on, database
emptied and refilled from the dump,
data folder and config put back,
`occ upgrade` if the dump is older than
the code, maintenance off, and the
Overview page read like a hawk. Two
disciplines make it work when it
matters: the dump and the folder come
from the **same frozen moment**, and
you rehearse the whole thing once
while the stakes are a quiet Sunday —
an untested restore is a hope wearing
a backup's coat.

## What people forget

- **The trash and versions are inside
  the data folder**, so they back up
  for free — one more reason the folder
  is half the product.
- **Calendars and contacts live in the
  database** (the events are rows, not
  files), which is why the database
  half is not optional even for people
  who "only use it for files."
- **Old versions of the server can't
  read a newer dump.** Restore onto
  the same version you backed up, then
  upgrade forward on purpose.

Check: your backup folder contains a
database dump and a data-folder copy
from the same frozen moment, it does
not live on the server's disk, and you
can say which half the lab lost and
which it kept. Chapter 12 puts the
whole machine to work.
