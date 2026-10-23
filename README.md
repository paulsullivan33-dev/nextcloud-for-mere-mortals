# Nextcloud for Mere Mortals

Somewhere in your house there is a
laptop holding the only copy of the
family's documents, and a phone
holding the only copy of its photos,
and a club secretary's inbox holding
the only copy of the minutes.
**Nextcloud** is the open-source
answer to that quiet emergency: the
file sync, sharing, calendars, and
contacts of a commercial cloud,
running on a computer in your own
house, with the files as ordinary
files on your own disk. This guide
explains how it works, installs it
by hand so every part has a name,
proves the doors its clients use, and
ends where it must: the backup that
is two jobs, not one.

The lab behind this guide ran the
real thing: **Nextcloud 35.0.2**, the
project's current release on build
day, its download checked against
the project's own checksum. It was
installed with `occ` onto PHP and
MariaDB, served by PHP's built-in
web server because the build machine
has no Apache — a declared deviation
whose two visible effects chapter 3
names — and exercised the way its
clients exercise it: a real web login,
WebDAV uploads and downloads that
came back byte-identical, a second
account made from the command line, a
share and a public link through the
sharing API, a calendar event in and
out over CalDAV, and a file's old
version and its stay in the trash,
both inspected on disk. Midway, the
build machine rebooted and lost its
system disk and the lab's database
with it, while the data folder
survived untouched; the entire proof
suite was then re-run on the rebuilt
server, and `criteria.md` keeps the
ledger of what was run and what was
only read.

## What this guide covers

- [**What Nextcloud is**](what-nextcloud-is.md) —
  the mental model: sync first, files
  as ordinary files, one account per
  person; what it is not (a backup, an
  office suite, end-to-end encrypted)
- [**The moving parts**](the-moving-parts.md) —
  web server and PHP, the database,
  the data folder, the clockwork, and
  the apps: what each holds, and what
  breaks when each stops
- [**Installing on a server**](installing-on-a-server.md) —
  the four doors, then the manual one
  in full: checksum, database, occ,
  trusted domains, and the lab's
  built-in-server deviation, told
  plainly
- [**First login and settings**](first-login-and-settings.md) —
  the login with its curtain open
  (cookies, request token, the Origin
  header that bit the lab), skeleton
  files, and the setup checks read as
  a to-do list
- [**Files every day**](files-every-day.md) —
  daily life in the Files app, files
  as files on disk, versions and the
  trashbin as the two safety nets
- [**WebDAV, the door everything uses**](webdav-the-door.md) —
  the protocol proven with curl and a
  hash; app passwords; what the
  desktop and phone clients are,
  honestly labelled
- [**Calendar, contacts, and the everyday apps**](calendar-contacts-and-apps.md) —
  CalDAV proven in the core, CardDAV
  beside it, and the app store's
  furniture under three rules
- [**Sharing with people and links**](sharing-with-people-and-links.md) —
  grants to named people through the
  OCS API, and public links fetched
  as a stranger — with the standing
  rules for keys shaped like addresses
- [**Users, groups, and admin**](users-groups-and-admin.md) —
  making accounts both ways (one of
  them hangs scripts), groups, quotas,
  and freezing instead of deleting
- [**The occ toolkit**](the-occ-toolkit.md) —
  the side door: status, integrity,
  setup checks, maintenance mode,
  files:scan, and the command that
  doesn't exist
- [**Backing up**](backing-up.md) —
  the database *and* the folder, in
  order, from the same frozen moment —
  and the lab's reboot as the parable
  that proves the point
- [**Recipes**](recipes.md) — the
  standing household server, the book
  club that runs itself, the expiring
  link, the new laptop, the Sunday
  backup
- [**The neighbours**](the-neighbours.md) —
  the commercial clouds, Syncthing,
  Seafile, Immich, the NAS suites:
  what each one trades
- [**Limits**](limits.md) — one
  machine, heavy extras, the admin's
  sight, and the upgrade treadmill,
  stated plainly
- [**Troubleshooting**](troubleshooting.md) —
  untrusted domains, the bouncing
  login, the 404 in the wrong wall,
  invisible files, and the hanging
  user-add
- [**Glossary**](glossary.md) — the
  terms, collected in one place

## What it doesn't cover

Running Nextcloud for anyone but a
household or a small club — clustering,
SSO and corporate identity, the
enterprise add-ons — and exposing a
server to the internet safely, which
is a subject of its own (TLS gets a
rule in chapter 3, not a tutorial).
The built-in office suites and Talk
calling are named and weighed, never
installed; the desktop and mobile
clients are described at the door
they use, which the lab proved, and
their own manuals take it from there.

## How to use this guide

Read chapter 1 for the model and
chapter 2 before installing anything —
knowing which part holds what turns
later confusion into a named problem.
Chapter 3 gets a server running;
chapter 4 with a browser open is the
natural next sitting. Readers who
mainly want the calendar should still
detour through chapter 6: the door
the calendar app knocks on is the
one proven there. And chapter 11 is
not the optional ending — schedule
its Sunday recipe while your server
is still young enough to rehearse a
restore in minutes. The lab's
transcripts live in
`nextcloud-lab/transcripts/`; its
notes are `examples/lab-notes.txt`.
