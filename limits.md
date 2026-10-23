# Limits

**Scope:** what Nextcloud won't do, or
won't do cheaply — the single machine,
the heavy extras, the admin's sight,
and the treadmill — stated before you
build a household on it.

## One server is one point of failure

Everything in this guide is one
program on one machine. When the
machine is off, unplugged, or stolen,
the service is too. Sync softens this —
the desktop machines keep their local
copies and work offline, reconciling
when the server returns — but the
calendars stop answering and the links
stop working. Clustering exists in the
project's enterprise weather; for a
household, the honest answers are a
backup (chapter 11) and the acceptance
that a home server has a home's
uptime, not a data centre's.

## The heavy extras are heavy

- **Office editing** (Collabora or
  ONLYOFFICE, integrated) is a second
  substantial server that happens to
  share an address. On a small machine
  it is the difference between a
  Nextcloud and a warm, slow room.
  Not installed in the lab; documented
  only, and worth a machine of its own
  if the household truly edits
  together.
- **Talk's video calling** beyond a
  couple of participants wants the
  extra calling backend the project
  documents, and bandwidth no guide
  can lend. Small calls, fine; the
  family reunion, plan otherwise.
- **Full-text search and the clever
  photo features** add a search engine
  and machine-learning weight of their
  own. Each is an app-store decision
  under chapter 7's rules, not a
  default.

## The admin can read the filing cabinet

Worth its own heading because it is
the limit people discover latest: in
the standard setup the server stores
files unencrypted *from itself*. The
admin — and anyone who takes the
machine — can read every user's files
from the data folder, exactly as
chapter 1 said. Server-side encryption
modules exist and trade this for real
costs (performance, features that
quietly stop working, recovery keys
that become the new crown jewels).
For a household server among family,
the standard setup is the sane one;
do not promise your users a privacy
the architecture doesn't provide.

## The treadmill

Nextcloud ships a major release about
three times a year, supports each
briefly, and expects upgrades in
sequence. An un-upgraded server ages
into insecurity the way an unpatched
anything does. Budget the habit, not
just the install: an hour a few times
a year, notes open, backup taken. If
that sentence sounds like a burden
rather than a hobby, chapter 13's
commercial row is the honest door.

## Scale honesty

The lab ran two accounts and three
small files on a machine doing other
work; it proved behaviour, not
performance. A household of five with
phones full of video is a different
load — mostly a matter of disk speed,
memory for PHP, and the cache the
setup checks keep mentioning. Numbers
travel badly between houses; the
Overview page's warnings and a week
of real use are the trustworthy
benchmark, and this guide offers no
figures it didn't measure on a workload
nothing like yours.

Check: none of these limits should be
new information by the time they bite.
If you can repeat the four — one
machine, heavy extras, the admin's
sight, the treadmill — you hold
Nextcloud at its true size. Chapter 15
is for the days it misbehaves anyway.
