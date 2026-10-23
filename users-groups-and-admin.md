# Users, Groups, and Admin

**Scope:** accounts — making them (two
ways, one of which hangs scripts),
groups and quotas, and the small print
of being the person in charge.

## Making a person

Two doors make an account. The web one —
*Administration → Users → New user* —
asks for a name, a display name, an
email, and a group, and can send an
invitation mail that lets the person
set their own password. The command one
is occ, and the lab took it (t03):

```
OC_PASS='<password>' php occ user:add \
  --password-from-env --display-name="Theo Marchetti" \
  --email=theo@example.com theo
```

Two lessons are baked into that line.
First, `--password-from-env`: without it
(and without a password typed at its
prompt), `user:add` **stops and asks** —
in a terminal, a friendly question; in
a script or a remote session, a hang
that looks like a crash. The lab met
both forms. Second, the cheerful
"Welcome email sent" line: occ reports
it whether or not a mail server exists
to carry the letter, and the lab had
none. Take the line as "the invitation
step ran," and hand the new person
their password by a channel that works
until your server's mail is configured
— a setting of its own (SMTP details
under *Administration → Basic settings*),
untouched by the lab and labelled so.

## What a new account gets

Its own corner of the data folder
(`data/theo/files/…`), the skeleton
files of chapter 4, no quota unless
you set one, and — the property the
lab proved before sharing anything —
**sight of nothing that isn't its own**
(t03's before-listing). Accounts are
also the unit of everything else in
this guide: files are owned by them,
shares are granted to them, versions
and trash live under them, quotas cap
them.

## Groups and quotas

**Groups** are how an admin thinks about
more than three people at once: make
the *BookClub* group once, and shares,
the "everyone in" settings, and simple
head-counting follow its membership
instead of naming five people each
time. A household of two can skip
groups forever without sin; a club
secretary cannot.

**Quotas** cap each account's total —
useful when the server's disk is also
the family's, and one nephew's video
archive is not. Set one under the
user's row in the web list, or by occ
(`user:setting <user> files quota`).
The honest default for a household is
no quota and an eye on the disk
(chapter 2's fuel gauge); quotas are
for when eyes have failed before.

## The admin's small print

- **The admin account is also a user.**
  Its files quota, its shares, its
  sessions behave like anyone's; only
  the extra settings pages mark it.
  Chapter 4's advice stands: daily work
  in an ordinary account, admin for
  admin-shaped tasks.
- **Disabling beats deleting.** A
  disabled account keeps its files and
  grants, frozen, and can be revived;
  a deleted account takes its files
  with it unless the admin first hands
  them to someone else (the user list
  offers exactly that transfer). The
  club member who left in a huff in
  March is the member who returns in
  October; freeze first.
- **Password resets ride on email.**
  With mail configured, a user resets
  their own from the login page. Without
  it, the admin sets a new one — by the
  web list, or `occ user:resetpassword`.
  Another reason chapter 4 wanted real
  email addresses on the accounts.
- **Sessions are visible and killable.**
  The token rows from chapter 4 list
  every signed-in client per user. The
  lost-phone drill is: change nothing
  in a panic — revoke that session and
  its app passwords (chapter 6) from
  the settings page, and the phone in
  the taxi becomes a brick that knows
  some filenames.

Check: you can create an account both
ways (and say why the occ one carries
a flag), explain what a new account
sees, set a group and a quota, and
freeze — not delete — a departing
member. Chapter 10 is the admin's
other hand: occ itself.
