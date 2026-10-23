# Troubleshooting

**Scope:** the failures this lab
actually produced, plus the classics
the project's manual answers daily —
each as symptom → cause → fix.

## "Access through untrusted domain"

**Symptom:** a polite warning page
instead of the login. **Cause:** the
name or address in the browser isn't
in `trusted_domains` — the server is
being asked to answer to a name it
doesn't know is its. **Fix:** add it
(chapter 3's step 4): `occ
config:system:set trusted_domains 1
--value=cloud.example.com`, with the
next free number in place of 1. Add
names, not wildcards — the list is a
guest list, not a net.

## The login bounces and no session appears

**Symptom:** correct password, straight
back to the login page; no new token
in the sessions list. **Cause, the
one the lab met:** the login POST
arrived without a valid Origin header
or request token, and the server
treated it as a replay rather than a
person (transcript t01 shows the
bounce, and the fix). Browsers send
both on their own — so when a real
user hits this, look for what sits
between browser and server eating
headers: an over-eager proxy, a
privacy tool, or the site being open
under two names at once. **Fix:**
reach the server by its one canonical
name (see untrusted domains, above),
clear the site's cookies, and remove
the middleman before blaming the
password.

## An address answers 404 under the little web server

**Symptom:** `/apps/files/` 404s while
`/index.php/apps/files/` works fine.
**Cause:** specific to servers without
rewriting — the lab's PHP built-in
server among them. A request for a
path that happens to match a real
folder in the code (`apps/files`
exists on disk) is answered by the
folder, not by Nextcloud's front door,
and the folder has nothing to say.
**Fix:** use the full `index.php`
form of addresses on such a server,
and know that Apache's `.htaccess`
(the standard install) makes the
pretty forms work. Not a Nextcloud
fault; a doorway in the wrong wall.

## Files on disk are invisible in Nextcloud

**Symptom:** files copied into the
data folder at the shell don't appear
for their owner. **Cause:** chapter
2's agreement is broken — the disk
moved and the index didn't. **Fix:**
`occ files:scan --all` (or
`occ files:scan <username>`) to
rebuild the index from the disk. Then
stop copying files in by hand; the
doors in chapters 5 and 6 exist so
the two halves never part.

## A script making users hangs forever

**Symptom:** `occ user:add` never
returns when run from a script or a
scheduled job. **Cause:** without a
password source it stops to ask, and
nobody is there (the lab met the
prompt; chapter 9 carries the scar).
**Fix:** `--password-from-env` with
`OC_PASS` set, every time, as in
transcript t03.

## "There is no command versions:list"

**Symptom:** occ denies the command
and suggests `versions:cleanup` and
`versions:expire`. **Cause:** there
isn't one; it's not your typo.
**Fix:** list versions in the web
page (file → Details → Versions) or at
the WebDAV door, as transcript t06
does. Pruning is occ's part of the
job; listing is the interfaces'.

## The setup checks complain

**Symptom:** warnings on the Overview
page / `occ setupchecks` exits 1.
**Cause:** it's a to-do list, not a
fire. The lab's three honest ones —
no maintenance window, a pending
mimetype migration, a data-directory
check that couldn't see its evidence
under the lab server — are walked in
chapter 4. **Fix:** work the list
top-down, re-run, and treat any
warning you can't explain as the
actual homework. A warning about the
database or the data folder outranks
every cosmetic one.

## Background jobs never run

**Symptom:** "last job ran hours/days
ago" on the Overview page; trash and
versions grow beards. **Cause:** the
mode is set to page-triggered (AJAX or
Webcron) on a quiet server, or the
system cron line was never added.
**Fix:** `occ background:cron`, plus a
real cron entry for `cron.php` every
five minutes, and prove it once by
hand as the lab did (t07).

## The welcome email never arrives

**Symptom:** occ and the user page
say a mail was sent; no mailbox
agrees. **Cause:** Nextcloud can only
hand mail to a mail service it has
been told about; out of the box there
may be none, and the "sent" line
means "handed over," not "delivered"
(chapter 9). **Fix:** configure SMTP
under *Administration → Basic
settings* and use its test button;
until then, deliver passwords by hand.

Check: each symptom above should now
read as a sentence with a named cause
rather than a mood. When one doesn't,
`occ status`, `occ setupchecks`, and
the log in the data folder
(`nextcloud.log`) are the three first
pages of the diary.
