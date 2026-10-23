# The Moving Parts

**Scope:** the five things a Nextcloud
is made of — web server and PHP, the
database, the data folder, the clockwork,
and the apps — what each holds, and what
breaks when each one stops.

## The guest list

A commercial service hides its machinery.
Nextcloud shows you yours, and there is
less of it than the feature list suggests.
Five parts do all the work:

| Part | What it is | What it holds |
|---|---|---|
| Web server + PHP | Apache or nginx driving PHP (the lab: PHP's built-in server) | nothing — it *is* the engine |
| The database | MariaDB/MySQL, PostgreSQL, or SQLite | accounts, shares, the file index, settings |
| The data folder | an ordinary folder on disk | the files themselves, versions, trash |
| The clockwork | cron running `cron.php` | housekeeping: expiring, tidying, notifying |
| The apps | installable pieces, core and extras | the features themselves |

### Web server and PHP

Nextcloud is a PHP program. Something
must accept each request — a page, a
file upload, a calendar query — and hand
it to PHP to run. In production that is
Apache or nginx, usually with PHP-FPM.
In the lab it is PHP's own built-in
server, a development tool that serves
one instance honestly and would be a
poor choice for a busy household;
chapter 3 declares the substitution and
its two visible effects (addresses carry
`index.php`, and no pretty URLs). When
this part stops, nothing answers at all:
the service is not degraded, it is gone.

### The database

Everything Nextcloud *knows* — as opposed
to everything it *stores* — lives in a
database: who the users are, what is
shared with whom, which version follows
which, every setting. The lab used
MariaDB (PostgreSQL works too; SQLite is
offered and fine for one person testing,
and the guide does not recommend it past
that — it queues its writers in single
file). One fact to hold onto: a file's
name appears in the database's index
*and* as a file on disk, and the two
halves must agree. Hand-copying files
into the data folder without telling the
database is the classic way to make
files invisible (chapter 15 has the
`occ files:scan` remedy). When the
database stops, the files still exist
and the service knows nothing — a filing
cabinet whose catalogue has burned.

### The data folder

One ordinary folder — the lab's sat
outside the web root on purpose — holding
a subfolder per user, and inside each,
their files as ordinary files. Beside
them, in the same folder, live the raw
materials of the safety features:
`files_versions` holds the old selves of
overwritten files, `files_trashbin`
holds the deleted. Chapter 5 and
transcript t06 show both with their
shoes on. When this folder's disk
fills, uploads fail first and questions
come later; watch it like a fuel gauge.

### The clockwork

A Nextcloud left alone still has work to
do at 3 a.m.: expiring old versions and
trash, sending notifications, cleaning
up after deleted users. That work is
done by **background jobs**, and
something must ring the bell every few
minutes. The dependable arrangement is
the system cron running Nextcloud's
`cron.php` — the lab set exactly that
mode (`occ background:cron`) and ran one
full pass by hand (t07). The lazier
modes — a job whenever someone loads a
page — work on a busy server and quietly
stop on a quiet one.

### The apps

Features arrive as **apps**: the Files
app, the DAV app that serves WebDAV,
CalDAV, and CardDAV, the sharing app,
the versions and trashbin apps, the
dashboard — all of these ship in the
release, enabled. The app store adds
more, from calendars you can see to
video calls. Two habits keep apps
honest: an app you don't use is attack
surface and upgrade friction you don't
need (disable it), and an app's promises
are its own — chapter 14 counts the
heavy ones. `occ app:list` is the census;
the lab's is quoted in the lab notes.

## How a request walks through

Upload a photo from your phone and the
parts take their turns: the web server
hands the request to PHP; the Files app
checks your account against the database;
the bytes land in your corner of the
data folder; the database records the
file's index entry; the versions app
notes whether an older self needs
keeping; and the clockwork will tidy the
rest tonight. Every chapter after this
one is one of those sentences, expanded.

Check: for each of the five parts you
should be able to answer "what does it
hold, and what does its silence look
like?" The database/folder pair is the
one to be surest of — chapter 11's
backup is exactly those two, taken
together, in the right order.
