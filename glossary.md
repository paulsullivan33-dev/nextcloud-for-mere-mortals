# Glossary

**Admin** — the account that manages
the server. The first account created
is one; it also keeps ordinary files
like anyone else.

**App** — an installable piece of
Nextcloud: the Files app, the DAV app,
and the store's extras share the word.
Apps bring features and upgrade duties
in equal measure.

**App password** — a separate,
revocable credential for one program
or device, accepted at the machine
doors (WebDAV and friends) but never
at the web login. The right key for
anything that isn't you typing.

**App store** — the catalogue built
into the admin pages; where the
Calendar web app, Deck, Notes, and the
rest come from.

**Background jobs** — the server's
housekeeping (expiring, tidying,
notifying), run in passes. Something
must ring for them; cron is the
dependable bell.

**CalDAV** — the calendar protocol:
events as .ics text files, moved with
WebDAV's verbs. Core machinery in
Nextcloud; proven in transcript t05.

**CardDAV** — the same arrangement
for contacts, as vCard files, at a
sibling address.

**Conflict copy** — what a sync client
keeps when a file changed in two
places at once: both versions, one
renamed, no silent winner.

**Data folder (data directory)** — the
ordinary folder holding every user's
files, versions, and trash. Half of
the server; the half that survives.

**Federation** — server-to-server
sharing between separate Nextclouds,
addressed like email for people.

**Index (file index)** — the
database's catalogue of what files
exist and whose they are. Must agree
with the disk; `occ files:scan`
reconciles them.

**Maintenance mode** — the server's
polite freeze: users see a notice,
clients pause, and the admin works on
a still target.

**occ** — the command-line tool in
every Nextcloud folder; installer,
stethoscope, and repair kit in one.

**OCS API** — the REST door the web
page itself uses for sharing and
much else; what scripts should call.

**Origin header** — the browser's
statement of which site a form came
from. The login checks it; scripts
forget it (transcript t01).

**Public link** — a share addressed
to a random token instead of a
person. Whoever holds the link holds
the file.

**Request token** — a one-page
credential proving a form submission
came from the page the server issued,
not a replay.

**Skeleton files** — the starter
documents and folders every new
account is stocked with.

**Trusted domain** — a name or
address the server agrees to answer
to; anything else gets a warning page.

**Version** — a file's kept old self,
taken when it is overwritten, listed
under its Details and restorable in
a click.

**WebDAV** — HTTP with extra verbs
(PUT, PROPFIND, and friends) for
files; the one door the desktop
client, the phone apps, and this
guide's curl all use.
