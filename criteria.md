# Writing Criteria

Every guide in this repo is written to the same
standard. If you're adding or editing a guide —
human or AI — hold it to these.

1. **Plain words, real ideas.** Simple language,
   never dumbed-down concepts. Explain jargon on
   first use; collect terms in the glossary.
2. **No hype.** No marketing adjectives, no
   "revolutionary," no promises about what
   something will do for the reader.
3. **Honest about limits.** Say what the thing
   *can't* do. State uncertainty instead of
   smoothing it over. Validation notes include
   what remains unverified.
4. **No invented numbers.** Benchmarks, defaults,
   and specs are either measured or qualified with
   "depends on your setup." If it wasn't tested,
   say so.
5. **Checkable.** Commands are meant to be run,
   with "Check:" blocks showing what success looks
   like. Sources are linked, not asserted.
6. **Respect the reader's setup.** Call out
   Windows/Mac/Linux differences. Don't assume a
   GPU, a budget, or prior experience.
7. **Safety isn't skipped.** Real risks get
   stated plainly, not buried.
8. **Scoped.** Each guide says what it covers and
   points elsewhere for the rest. No guide
   pretends to be the whole subject.
9. **Structure over prose.** Tables, before/after
   examples, symptom → fix. Scannable beats essay.

## Verification notes for this guide

Built and verified 2026-10-22/23 against
**Nextcloud 35.0.2** (the project's current
stable release on build day), PHP 8.3.6, and
MariaDB 10.11.14.

**Primary sources read, not remembered:** the
release tarball itself from
download.nextcloud.com (SHA-256 matched the
published checksum, `dfc7955e…f162d`); the
installed code's own behaviour, including the
login controller's origin-check, which the lab
met the hard way before reading; and the
project's documentation for installation
routes, backup and restore, upgrades, and the
client apps.

**The lab, and what happened to it:** the
server was installed by hand (tarball, MariaDB,
`occ maintenance:install`, data folder outside
the web root) and served by PHP's built-in web
server on a loopback address, because the
sandbox has no Apache or nginx — a declared
deviation with two visible effects: addresses
keep `index.php`, and one pretty address
(`/apps/files/`) 404s because a real folder of
that name intercepts it (chapter 15). Midway
through the build the sandbox machine rebooted
and its system disk returned to the factory
image, destroying PHP, MariaDB, and the first
instance's database; the workspace disk — the
release, the fixtures, and the first data
folder, fossils intact — survived. The lab was
rebuilt and **the entire proof suite was
re-run from scratch**; every transcript below
and in `nextcloud-lab/transcripts/` is from
that second, complete run.

**Ran for real** (transcripts in
`nextcloud-lab/transcripts/`):

- t00 — download checksum matched; `occ
  maintenance:install` succeeded; trusted
  domain set by occ; `occ status` reports
  35.0.2 installed, `occ check` clean;
  `status.php` agrees.
- t01 — the real web login with curl: the
  attempt without an Origin header bounced
  to the login page and created no token;
  with it, 303 → dashboard, the Files app
  answered 200 carrying `data-user="ruth"`,
  and a session-token row appeared in
  `oc_authtoken`.
- t02 — WebDAV end to end: two PUTs (201),
  a PROPFIND listing, a GET back (200), and
  the downloaded file's SHA-256 **identical**
  to the fixture's (`15df1807…`).
- t03 — `occ user:add --password-from-env`
  created the second user; his PROPFIND
  showed only the skeleton files; an OCS
  share POST returned status ok with the
  grant's anatomy (permissions 19); the
  shared file then appeared in his listing.
- t04 — a public link (shareType=3) minted
  via the same API; fetched with no
  credentials: page 200, and the
  `/download` fetch **byte-identical**
  (SHA-256 `68a590c5…`) to the original.
- t05 — CalDAV with no extra app: calendars
  listed (personal, contact_birthdays,
  inbox, outbox, trashbin); an .ics event
  PUT returned 201 and a GET returned it
  with summary and start intact.
- t06 — versions and trash: the file's
  `oc:fileid` fetched, an overwrite (204),
  the versions door listing two stored
  versions and the version file found on
  disk under `files_versions/`; a DELETE
  (204, then 404) and the file — with its
  old version — found in `files_trashbin/`.
  Also established by asking: there is no
  `occ versions:list` in this release.
- t07 — `occ integrity:check-core` exit 0;
  background mode set to cron and one
  `cron.php` pass completed (exit 0);
  `occ setupchecks` output reviewed (mostly
  passes; honest warnings about the
  maintenance window, a pending mimetype
  migration, and a data-directory check the
  toy web server can't satisfy); a real
  `mysqldump` taken (901,186 bytes, 138
  CREATE TABLEs) and opened — both fixture
  filenames present.

**Documented only, and labelled as such in
the chapters:** the Docker All-in-One and
compose routes and the snap (no container
runtime exists in the sandbox;
`examples/docker-compose.yml` follows the
project's own examples); Apache/nginx
serving and pretty URLs; the desktop and
mobile sync clients (the WebDAV door they
use is the one t02 proves; no client was run);
Talk; the integrated office suites
(Collabora/ONLYOFFICE); CardDAV writes (the
dav machinery and door are t05's; no contact
was written); external storage mounts;
Redis/APCu scaling; password- and
upload-only public links (the plain link is
t04's); federation; backup **restoration**
(chapter 11 teaches the documented procedure;
the two-halves distinction itself was
demonstrated by the lab's own reboot, the
hard way); the upgrade sequence.

**Fixtures:** the admin (Ruth Calloway,
ruth@example.com), the second user (Theo
Marchetti, theo@example.com), the recipe and
book-club files, and the calendar event are
invented and were generated on the build
machine. Passwords and the share token are
redacted in every transcript.
