# Recipes

**Scope:** five standing arrangements
built from the parts the earlier
chapters proved, each with its honest
label — lab-proven, or assembled from
proven parts and the project's manual.

## 1. The standing household server

*Proven in the lab, at lab scale.*

Manual install (chapter 3) on a small
always-on machine; data folder on the
biggest disk; cron mode set (chapter 4);
one account per person (chapter 9);
desktop client on the work machines
and the photo upload in the phone app
(both documented, chapter 6). Sunday
night, the chapter-11 backup runs to
the second disk. This is the shape the
whole guide has been describing; its
only lab-scale caveat is the web
server — at home, Apache does the job
the built-in server did here.

## 2. The book club that runs itself

*Proven end to end (t03, t05).*

A *BookClub* group; one shared folder,
*Club Papers*, shared to the group
with edit permission — agendas and
minutes live there once, for everyone.
The secretary shares the month's
reading as a file to named members;
the dinner goes in the shared
calendar by CalDAV from her own
calendar app, and appears on every
member's phone without a single
"what time was it again?" Costs: one
occ line per new member (chapter 9).

## 3. The link for the person without an account

*Proven (t04), with the documented
options noted.*

The accountant needs the receipts
folder; the plumber needs one photo.
A public link on exactly that folder
or file, expiry set to a week, from
the share dialog — fetched by the lab
as a stranger, byte-identical. For
collecting rather than sending, the
folder link set to upload-only
(documented, chapter 8): the reunion
guests pour photos in and see none of
each other's. Revoke both at month's
end from the shares list, the way
you'd collect spare keys.

## 4. The new laptop, synced by supper

*Assembled from proven parts.*

New machine on the desk at five. The
desktop client (documented, chapter
6) signs in with an app password —
never the account password — and the
home folder begins to arrive over the
same WebDAV door the lab hashed its
way through. By supper the Documents
folder is whole; the big archive
folder is left to sync overnight.
When the old laptop is wiped, its app
password is revoked from the settings
page (chapter 9's lost-phone drill,
at walking pace).

## 5. The Sunday backup

*Proven in pieces (t07), assembled as
the standing habit.*

A small script, run by the same cron
that rings the server's bell:

1. `occ maintenance:mode --on`
2. `mysqldump --single-transaction` to
   a dated file — t07's dump, weighed
   and opened.
3. rsync the data folder and `config/`
   to the backup disk, dated alongside.
4. `occ maintenance:mode --off`
5. Keep four Sundays; the drive leaves
   the house monthly (chapter 11's
   geography rule).

Fifteen quiet minutes a week is the
price of the parable in chapter 11
never being about you.

Check: each recipe names the chapters
it stands on, and its label says what
was proven and what was assembled.
Chapter 13 looks over the fence.
