# What Nextcloud Is

**Scope:** the mental model — a file sync
and sharing service, with calendars,
contacts, and a small crowd of optional
extras, that runs on a computer you own —
plus what it is not, and the lab this
guide's claims rest on.

## The one-paragraph version

**Nextcloud** is open-source software
that gives a household or a small club
the thing Dropbox and Google Drive sell:
a place where your files live, kept in
step across your computers and phone,
reachable from any web browser, and
shareable with a link when you choose.
On top of the files it adds calendars,
contacts, photo galleries, and an app
store of extras. The difference is where
it runs and who holds the keys: the
server is a program on a machine in your
house, the files sit in an ordinary
folder on its disk, and no company has
an account in the arrangement at all.

That is the whole idea. The rest of this
guide is the fine print: the five moving
parts, the install done by hand so the
parts have names, the doors everything
talks through, and the backup that is
two jobs wearing one coat.

## The shape of the thing

Four pieces of the experience are worth
naming before any machinery:

- **Sync is the point, the web page is
  the proof.** Nextcloud's first job is
  keeping your files on your server and
  mirrored to the machines you work on.
  The browser interface is how you check
  on it, share from it, and use it from
  a machine that has no client installed.
- **Your files stay ordinary files.**
  Upload `pancake-recipe.txt` and it sits
  in the data folder as exactly that
  file, under your name, readable by any
  program. Nextcloud keeps a database of
  everything it knows *about* the files —
  owners, shares, versions — but it does
  not lock the files themselves inside a
  private format. If Nextcloud vanished
  tomorrow, the files would still be
  sitting there. Chapter 11 leans on
  this harder than any other fact here.
- **Each person has their own account.**
  One Nextcloud serves the household;
  everyone signs in as themselves, sees
  their own files, and shares deliberately.
  Accounts are private by default — the
  lab's second user could see none of the
  admin's files until one was shared with
  him (transcript t03). The first account
  created is the **admin**.
- **The extras are apps, and apps are
  optional.** Files, calendars, and
  contacts are the core most people mean
  by "Nextcloud." Video calls, office
  editing, and the rest arrive as apps
  you install — each with its own weight,
  which chapter 14 counts honestly.

## What it is not

Four confusions worth clearing away:

- It is **not a backup by itself**. A
  sync service faithfully mirrors your
  mistakes: delete a file everywhere and
  Nextcloud helps. Versions and the
  trashbin soften that (chapter 5), and
  a real backup is a separate habit
  (chapter 11). This is the single most
  expensive misunderstanding in the
  whole subject.
- It is **not end-to-end encrypted** in
  the ordinary setup. The server can read
  what it stores; the admin can read what
  the server stores. Whoever holds the
  machine holds the files. For a household
  server that is usually the point — but
  say it plainly before promising privacy
  from the wrong person.
- It is **not an office suite**. It can
  open documents, and with a heavy partner
  app installed it can edit them alongside
  other people. Out of the box it is a
  filing cabinet with a meeting room
  attached, not the meeting.
- It is **not finished, in the old sense**.
  Nextcloud releases a major version
  roughly three times a year and expects
  you to keep up; old versions stop
  receiving fixes. Pinning your version,
  reading the release notes, and
  upgrading deliberately are standing
  habits — chapter 3 builds them in.

## Versions and the lab

This guide was built against **Nextcloud
35.0.2**, the current stable release on
build day, downloaded from the project's
own site with its checksum verified
(transcript t00). The lab installed it
by hand — PHP, MariaDB, the official
tarball, the `occ` command — on the build
machine, served it with PHP's own small
web server because the sandbox has no
Apache, and exercised it the way its
own clients do: the web login form,
WebDAV for files, CalDAV for a calendar
event, and the sharing API, with the
results hashed and compared where
bytes mattered.

One thing happened to the lab that no
amount of planning orders up: midway,
the sandbox machine rebooted and lost
its system disk — the database with it —
while the data folder, on a different
disk, survived untouched. The whole
proof suite was re-run on the rebuilt
server, and the transcripts are from
that complete second run. `criteria.md`
keeps the full ledger, and chapter 11
tells the story as the parable it is.

Check: you should now be able to say
where a Nextcloud file physically lives,
why an account sees nothing until it is
shared something, and why "it's synced"
and "it's backed up" are different
sentences. If that is clear, chapter 2
opens the box.
