# Calendar, Contacts, and the Everyday Apps

**Scope:** the part of Nextcloud that
isn't files — calendars and contacts,
whose protocols are core and were proven
here, and the app-store layer above
them, labelled as what it is.

## The calendars are already in

A fresh Nextcloud, with nothing extra
installed, already answers **CalDAV** —
the calendar sibling of WebDAV, served
by the same dav machinery in the same
`remote.php/dav/` building. The lab
proved it with curl (transcript t05):
the admin's calendar collection held a
`personal` calendar from the start (plus
the automatic birthdays calendar and
the scheduling plumbing), an event went
in as a small text file in the standard
**.ics** format — PUT, **201** — and
came back out with its summary and time
intact.

That is the layer phone and desktop
calendar programs speak. Point an iPhone,
an Android calendar sync app, or
Thunderbird at
`remote.php/dav/calendars/<username>/`
with an app password, and the household
calendar appears in the app people
already open — which is the difference
between a calendar that gets used and a
website that gets forgotten.

**CardDAV** is the same arrangement for
contacts, at `remote.php/dav/addressbooks/`,
with contacts as small standard vCard
files. The lab listed the calendar
collection rather than writing a contact,
so contacts are documented here on the
strength of the same dav app and the
project's manual — the door is the one
t05 walked through, the furniture is
the project's word for it.

## The web apps are a store away

What the core does *not* ship is the
pretty web furniture: the Calendar and
Contacts **web apps** are installed from
the built-in app store (the lab's
`occ app:list` census, quoted in the lab
notes, has the dav machinery but no
calendar interface — the protocols are
in the walls, the wallpaper is
downloadable). Installing one is an
admin click, or `occ app:install
calendar`, and from then on the web
page grows a calendar of its own.
Rules for the store, learned cheap
here and dear elsewhere:

- **Every app is a commitment.** It will
  need upgrading when the server does,
  and an abandoned app can hold an
  upgrade hostage (chapter 14).
- **Prefer the project's own apps** and
  ones with recent releases; the store
  page shows both without being asked.
- **Install to answer a want**, not to
  complete a set. A server with five
  apps used daily beats one with forty
  used never.

## The everyday names, placed

- **Calendar / Contacts** — as above:
  core protocols, store interfaces.
- **Deck** — kanban boards (cards in
  columns), the household to-do wall;
  store app, documented only here.
- **Notes** — small markdown notes,
  stored as files in your folder, so
  they ride the sync of chapter 6;
  store app, documented only.
- **Photos** — the gallery face on your
  files; ships with the release, and
  the Immich guide in this series is
  the honest comparison if photos are
  the main thing you keep.
- **Talk** — chat and video calls, the
  heaviest common extra; a small
  household can run it, a busy one
  wants the extra calling machinery the
  project documents. Named here, weighed
  in chapter 14, not installed in the lab.
- **Mail** — a webmail skin over your
  existing IMAP account; it fetches
  nothing into Nextcloud and replaces
  nothing about your mail server.

Check: you can name which parts of the
calendar story are in the walls (and
were proven with curl) and which are
wallpaper from the store — and you have
a rule for the store that will still
sound wise at upgrade time.
