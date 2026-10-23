# Installing on a Server

**Scope:** the four doors into Nextcloud,
and a full walk through the manual one —
the route the lab took and proved — from
downloading the release to the server
answering `status.php`.

## Choose your door first

The project offers four ways in, and the
choice decides how much machinery is
yours to understand:

| Route | What you get | Who it's for |
|---|---|---|
| **Manual** (this chapter) | the tarball, your PHP, your database | learning it, and most self-hosters |
| All-in-One (Docker) | a master container that runs the rest | the project's recommended easy route |
| Snap | one package that manages itself | Ubuntu appliance-style installs |
| Community packages/VMs | someone else's assembly | convenience, at the price of their choices |

The Docker and snap routes are
**documented only** in this guide — the
lab's machine has no container runtime —
and `examples/docker-compose.yml` shows
the plain compose shape for readers who
take that door. They converge on the
same five parts from chapter 2; only the
plumbing differs. The manual route is
the one that teaches the names, so it is
the one this guide proves.

## What the manual route needs

- A Linux server (the lab: Ubuntu with
  PHP 8.3.6 and MariaDB 10.11.14).
- PHP with its Nextcloud entourage —
  the modules the installer checks for:
  xml, mbstring, intl, gd, curl, zip,
  and a database driver (pdo_mysql for
  MariaDB). Missing pieces are named by
  the installer and by `occ setupchecks`,
  not discovered by ambush.
- A database and an empty database
  inside it, with a user who owns it.
- A folder for the data, on a disk with
  room to grow, ideally outside the
  web root so no web address can ever
  point at it directly.

## The install, as the lab ran it

**1. Download, and check the download.**
The release is one tarball; the project
publishes its SHA-256 beside it. Compare
before unpacking — transcript t00 shows
the two hashes agreeing, which is the
difference between installing Nextcloud
and installing whatever the network felt
like sending.

**2. Make the database.** Three lines of
SQL (t00): the database, a user, a grant.
Nothing about this is Nextcloud-specific;
it is the same courtesy any PHP program
asks of MariaDB.

**3. Install with occ.** The tarball's
command-line tool does the whole job —
tables, first admin, config — in one
command, given the database details, an
admin name and password, and the data
folder (t00 again). The web installer
exists for the same step and is fine;
occ wins because its command can be
written down, and this guide is in the
writing-things-down business.

**4. Name the server.** A fresh install
trusts only `localhost`. Every other
name or address your people will type
must be added as a **trusted domain**, or
the server refuses them with a polite
warning page (chapter 15). The lab added
its numeric address by occ (t00); you
will add something like `cloud.example.com`.

**5. Serve it.** Under Apache, the
release's own `.htaccess` gives pretty
addresses (`/apps/files/`) and the
project's manual gives the virtual-host
block. **The lab's declared deviation:**
no Apache exists in the sandbox, so the
server ran on PHP's built-in web server,
started on the lab address with a handful
of worker processes. Two consequences,
both visible in the transcripts:
addresses keep their `index.php`
(`/index.php/apps/files/`), and WebDAV
clients must be pointed at the full
`remote.php` address — which they should
be anyway. Nothing functional differs;
everything in chapters 4–10 ran over
this server.

**6. Look at it.** `occ status` and
`status.php` should agree the server is
installed at the version you downloaded
(t00), and the login page should answer
200. Chapter 4 takes the first login
from there.

## The standing habits to start now

- **HTTPS is not optional in real life.**
  The lab speaks plain HTTP on a loopback
  address nobody else can reach. The day
  your server answers to a real name, put
  TLS in front of it — a reverse proxy or
  the web server itself, with a real
  certificate — before the first password
  crosses the wire. Passwords and share
  tokens travel in these requests.
- **Pin your version.** The lab installed
  "latest" deliberately, to meet the
  current release; a standing server
  should upgrade on purpose, after
  reading the notes, with a backup from
  chapter 11 in hand — never because a
  Tuesday felt lucky.
- **Write your install down.** The
  commands above, your database name,
  your data folder's path. The person
  who rebuilds this server at midnight
  is you, and you will be grateful.

Check: your server answers `status.php`
with `installed: true` and your version,
`occ check` is quiet, and you can name
which route you took and what your data
folder is. Chapter 4 signs in.
