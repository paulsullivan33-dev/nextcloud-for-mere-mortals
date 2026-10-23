# The occ Toolkit

**Scope:** `occ` — the server's own
command-line hand — what it's for, the
commands this guide has already leaned
on, and the ones to know before an
upgrade or a bad day.

## What occ is

Every Nextcloud folder carries `occ`,
a PHP script run from the shell as the
web server's user (the lab ran it
directly; the transcripts show the bare
form `php occ …`). It speaks to the
same database and config the web page
uses, which makes it the tool for work
the page can't do: installing before
any page exists, repairing while the
site is down, asking questions in a
script. Anything occ changes, the web
page sees immediately — there is one
server, and occ is its side door.

## The daily handful

- **`occ status`** — installed or not,
  the version, maintenance on or off.
  The first question on any bad day.
- **`occ check`** — a quiet pass over
  the basics; silence is success (t00).
- **`occ integrity:check-core`** — the
  installed code against the project's
  signatures. The lab's passed clean
  (t07); a failure here means files
  were altered, by an upgrade gone
  wrong or by hands that shouldn't
  have been there, and either way you
  stop and read before proceeding.
- **`occ setupchecks`** — the Overview
  page as text (t07), for scripts and
  for pasting into a cry for help.
- **`occ config:system:get/set`** —
  read and change `config.php` values
  without an editor; how the lab set
  its trusted domain (t00).
  `config:list` shows the whole
  configuration, app values included.

## The user-side commands

Chapter 9's `user:add` (with its
`--password-from-env` flag) lives here
too, alongside `user:list`, `user:info`,
`user:disable`, and
`user:resetpassword`. `group:` commands
mirror them. These are the batch tools:
a club secretary onboarding twelve
members writes twelve lines instead of
twelve afternoons of clicking — and
writes them into a file, which becomes
the record.

## The repair shelf

- **`occ maintenance:mode --on/--off`** —
  freeze the server politely: users see
  a maintenance page, sync clients pause,
  and you work on a still target.
  Backups and upgrades both start here
  (chapter 11).
- **`occ files:scan --all`** — rebuild
  the index from the disk. The remedy
  for files copied in by hand, and for
  "I can see it in the folder but not
  in Nextcloud" (chapter 15).
- **`occ maintenance:repair`** — a
  battery of known fix-ups; its
  `--include-expensive` form runs the
  slow ones, like the mimetype
  migration the lab's setup checks
  pointed at (t07).
- **`occ versions:expire` /
  `versions:cleanup`** — prune the old
  selves chapter 5 described. Note the
  absence the lab discovered asking for
  the list: there is **no
  `occ versions:list`** — listings live
  in the web page and at the WebDAV
  door (t06). Tools are allowed to
  surprise you; write the surprise down.
- **`occ app:list` / `app:install` /
  `app:disable`** — the census and the
  controls for chapter 7's store. The
  lab's list is the census quoted in
  the lab notes.
- **`occ background:cron`** and friends
  set how the clockwork of chapter 2 is
  rung; `occ background-job:list` shows
  what's pending.

## A word on upgrades

Upgrades are occ's home ground:
maintenance on, replace the code,
`occ upgrade`, maintenance off — with
the release notes read first and the
chapter-11 backup taken before the
first step, not the third. The lab
installed fresh rather than upgrading,
so the upgrade sequence is documented
here from the project's manual, and
labelled as such; nothing in this
guide's transcripts shows an upgrade.

Check: with occ alone you can answer
"is it up, is it whole, who's on it,
what's installed" in under a minute,
and freeze it safely before touching
anything. Chapter 11 uses exactly
those moves, in order.
