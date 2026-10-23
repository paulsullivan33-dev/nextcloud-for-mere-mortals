# Sharing With People and Links

**Scope:** the two kinds of sharing —
to a named person on the server, and to
anyone holding a link — both exercised
in the lab through the same API the web
page's Share button calls.

## Sharing is a grant, not a copy

When Ruth shares `book-club-notes.txt`
with Theo, no second file appears
anywhere. The database records a grant —
this file, this person, these
permissions — and Theo's home simply
gains a window onto Ruth's file
(transcript t03, where his listing
before and after is the whole story).
Consequences worth internalising:

- **Edits are shared too.** Theo opening
  the file edits Ruth's file. The grant
  the lab made carried permission **19**
  in the API's bitmask — read, update,
  and delete, short of re-sharing — so
  the club notes are genuinely joint
  property. Read-only is a choice at
  share time (the web dialog's tick
  boxes); make it consciously.
- **Unsharing is instant and total.**
  Remove the grant and the window
  closes; nothing of Theo's copy
  remains, because there never was one.
- **Folders share like files**, and a
  shared folder a person can write to
  is the household's shared drive in
  everything but name — the recipe
  chapter builds one.

The web route is the Share icon beside
any file: type a name, pick permissions,
done. The lab used the **OCS API** —
the REST door the web page itself calls
(`POST /ocs/v2.php/apps/files_sharing/api/v1/shares`)
— because a curl command can be written
down and checked, and its response (t03)
shows the grant's anatomy: an id, the
owner, the path, the permissions number,
the recipient. Anything the page does,
a script can do through that door,
which is how club secretaries migrate
whole folders of grants without
clicking each one.

## Public links: a key shaped like an address

The second kind of share has no person
in it at all. `shareType=3` mints a
**public link** — a URL whose tail is a
random token — and the token *is* the
permission. The lab minted one for the
same notes and then behaved like a
stranger (transcript t04): no account,
no cookies, the public page opened
(**200**), and the file came down from
the link's `/download` address
**byte-identical** to the original.

That is exactly as powerful and exactly
as dangerous as it sounds, so the
standing rules:

- **A link is a key.** Whoever holds it
  — a forwarded email's reader, a chat
  log's scraper, a lapsed club member —
  holds the file. Share links for things
  you'd pin to the clubhouse door, or
  to named people only.
- **Set an expiry.** The share dialog
  and the admin defaults (chapter 4) can
  put a date on a link's life. A link
  for Saturday's agenda has no business
  working next year.
- **Password and upload-only are real
  options.** Links can demand a password,
  and a *folder* link can be set to
  accept uploads without showing its
  contents — the digital shoebox for
  the reunion photos. The lab exercised
  the plain link only; these two are
  documented from the dialog and the
  manual, and labelled as such.
- **The list of live links is a settings
  page away** — audit it the way you'd
  audit spare house keys, and revoke
  the ones you don't recognise by name.

## Sharing beyond the house

Nextcloud can also share *between
servers* — federation — where a user on
another household's Nextcloud appears
by their federated address. It is built
on the same grants, the lab ran one
server only, and it is named here so the
word in the settings isn't a surprise;
the project's manual carries it from
there.

Check: you can share a file to a person
and say precisely what they may do to
it; you can mint a link, fetch from it
as a stranger, and revoke it; and you
can explain why the link's convenience
and its risk are the same property.
Chapter 9 makes the people the sharing
is between.
