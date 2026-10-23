# WebDAV, the Door Everything Uses

**Scope:** WebDAV — the protocol the
desktop client, the phone apps, and half
the internet's file tools speak to
Nextcloud — proven end to end with curl,
and what that means for the clients this
lab didn't run.

## One door, many callers

Nextcloud's web page is for people. Its
machines talk through a single address
shape:

```
http://your.server/remote.php/dav/files/<username>/
```

**WebDAV** is HTTP with extra verbs. You
know GET and POST; WebDAV adds PUT for
"store this file here," DELETE, MOVE,
and PROPFIND — "list this folder, with
details." That is nearly the whole
protocol, and it is old, standard, and
implemented by everything from Windows
Explorer's network-drive mapping to the
humblest sync tool. When a program says
it "supports Nextcloud," it mostly means
it speaks to this door.

## The lab walks through it

Transcript t02 is the whole proof, run
with nothing but curl and the admin's
credentials:

- `PUT pancake-recipe.txt` → **201**,
  the file exists.
- `PUT book-club-notes.txt` → **201**.
- `PROPFIND` on the home → the listing,
  skeleton files and new arrivals alike.
- `GET` the recipe back → **200**, and
  its SHA-256 equals the original's,
  digit for digit. What went up is what
  came back; the door does not nibble.

Chapters 5 and 8 reuse the same door
for versions, the trashbin, and the
calendar (a sibling address under the
same `remote.php/dav/` roof). Learn one
door and the whole building's plan
makes sense.

## App passwords: the right key for a program

The lab's curl used the account's real
password because curl is a lab tool that
leaves with the lab. A program that
*stays* — a sync client, a backup
script, a phone — should get an **app
password**: a separate credential, made
in *Personal settings → Security*, that
works only through the machine doors
(WebDAV and friends), never the web
login, and can be revoked on its own
when a laptop is lost. Treat the main
password as the house key and app
passwords as labelled copies for named
guests; the settings page even lists
which session or app each copy belongs
to (the token rows of chapter 4).

## The clients, honestly labelled

**Documented, not run:** no desktop or
phone client existed in the lab. What
can be said from the bench is what they
*are*: the desktop client (Windows,
Mac, Linux) keeps a chosen folder in
step with the server through this door,
both ways, with the same version and
conflict behaviour chapter 5 described;
the phone apps upload photos and browse
through it too. The project's manuals
cover their installation, and the door
they knock on is the one proven here —
if a client ever misbehaves, a curl
PROPFIND against its account will tell
you whether the fault is in the client
or the building, which is the real
reason this chapter exists.

Two client-shaped facts worth the ink:

- **Conflict copies are a feature.** If
  the same file changes in two places
  while disconnected, the client keeps
  both and names one a conflict copy,
  rather than picking a winner with your
  work in its hands. Meeting one means
  two edits raced; merge by eye.
- **The address must be exact.** Clients
  want the server address, and most find
  the DAV door themselves; when one asks,
  it wants the full `remote.php/dav/`
  address from this chapter — under the
  lab's toy web server, the `index.php`
  form of it. A missing door is the
  cause of half of all "won't connect"
  reports (chapter 15).

Check: with curl alone you can put a
file up, list it, fetch it back, and
prove by hash that the round trip was
faithful — and you can say which door
every client you own will use, and what
key it should hold.
