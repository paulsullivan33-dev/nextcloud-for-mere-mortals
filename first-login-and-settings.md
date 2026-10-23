# First Login and Settings

**Scope:** the first sign-in — which the
lab performed with curl, so every moving
part of it is visible — and the admin
settings and setup checks that are worth
meeting on day one.

## Signing in, with the curtain open

The login page is a form, and a login is
the form being handed back with three
things attached: your name and password,
the **request token** the page was
issued with (proof the password is being
typed into the real page, not replayed
by a stranger's script), and an
**Origin header** — the browser's
statement of which site the form came
from. Nextcloud checks all of it. The
lab's first attempt left the Origin out,
as curl does, and the server bounced it
straight back to the login page without
creating a session (transcript t01). A
browser sends the header without being
asked, which is why this lesson only
bites people scripting logins — but it
is the honest shape of the thing, and
chapter 15 keeps it for the day a proxy
or an odd client eats the header for you.

With everything present, the answer is
a 303 to the dashboard, the Files app
opens under your name, and — the part
worth knowing exists — the database
gains a **session token** row naming the
client that signed in (t01). That row
is why "log out other sessions" in your
settings works, and why an app password
(chapter 6) is a better thing to hand a
program than your password.

## The first account is the admin

The account the installer made **is**
the administrator — the same account
that manages users and settings also
keeps its own files there. Two habits
follow. Use a real password for it, not
the family one; and for daily driving,
make yourself an ordinary second account
(chapter 9) so that a stolen session is
a stolen *user*, not a stolen server.

## What you're greeted with

A new account's home is not empty. The
server stocks it with **skeleton files**:
the manual, a starter document or two,
Photos and Documents folders, a short
intro video (the lab's listing is in
t02). They are samples, deletable like
anything else, and every new user gets
their own set — change the skeleton
folder if your household would rather
start with the house rules than the
manual; it's an admin setting.

## The settings worth meeting today

- **Personal settings** (your avatar
  menu): your display name and email —
  the email is where password resets and
  share notifications go, so a wrong one
  is a quiet future failure. The lab set
  the admin's by occ (t00's companion
  command); the page does it just as well.
- **Administration → Overview** is the
  server's report card, and it is the web
  face of `occ setupchecks`. Run it on
  day one and read it as a to-do list,
  not a verdict. The lab's list (t07)
  was mostly ticks, with warnings that
  are worth explaining once:
  - *No maintenance window set* — heavy
    housekeeping may run while people
    work. Set it to your small hours.
  - *Mimetype migrations available* — a
    known, named occ command clears it.
  - *Data directory protection could not
    be checked* — under the lab's toy web
    server the check can't see its usual
    evidence. On a real server it means:
    confirm your data folder is outside
    the web root, as chapter 3 advised.
  A bare install will also note the
  missing memory cache (APCu/Redis) and
  other scaling pieces. For a household,
  those are "later, if it feels slow,"
  not day-one homework — chapter 14
  says which ones ever matter.
- **Administration → Sharing** holds the
  defaults chapter 8 uses: whether links
  may be public at all, whether they
  expire by default. Decide these as a
  household policy now, not per-link
  under time pressure.

## Background jobs, once

Set the background-job mode to **cron**
(`occ background:cron`) and give the
system a cron line for `cron.php` every
five minutes. The lab ran one pass by
hand to prove the machinery (t07). The
Overview page's "last job ran … ago"
line is your standing proof the bell is
being rung.

Check: you can sign in, the Overview
list has been read (and its warnings
can be explained in your own words),
your email address is right, and the
cron mode is set. Chapter 5 goes where
you'll spend your days: the files.
