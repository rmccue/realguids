# Real GUIDs

Use real UUIDs for the GUIDs on your WordPress site. No more replacing the URL when migrating from development to staging.

```
      ^
     / \
    /   \
   /     \
  /       \
   |     |
   |     |             /--------------------------------\
   |     |        ,--- | Hi! I'm Sid the Squid, and I'm |
  (o)   (o)      /     | here to generate your GUIDs!   |
   |     |      /      \________________________________/
   \,,,,,/  ---'
   , , , ,
  (  ) (  )
 )  )  )   (
(    )  )   )
```
Wondering what a UUID looks like? Here's one: `urn:uuid:f52b1c3f-bfd8-4065-bade-d012276152d6`


## Installation

1. Add this plugin to your site.
2. Activate it.
3. Live. Laugh. Love.


## FAQ

### Why real GUIDs?

WordPress uses the post permalink as a GUID right now, but most people want to hide their staging/dev environment URLs from production when migrating. That often makes it hard to deduplicate the data however, as the one thing that's meant to be a unique identifier gets changed.

This solves that. Now there's no need to change the GUID. Ever. Please.


### Why UUID v4?

v1 incorporates the MAC, and can have problems with uniqueness.

v2 incorporates the Unix user and group IDs, and is just generally a bad idea.

v3 and v5 are deterministic based on their inputs (namespace and "name"), but we want the randomness.

Hence, v4.


### But... why real GUIDs?

...Are you serious? I just told you.

I actually just wanted an excuse to draw an ASCII squid.


## License

Stop worrying about licensing and go have fun. There's a squid up there, for goodness' sake!

(Licensed under the GPL, because it's a derivative work of WP, natch.)


## P.S.

You're fantastic. :heart:
