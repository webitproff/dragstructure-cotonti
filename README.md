# Drag & Drop Structure — Visual Category Editor for Cotonti

> **Extension for Cotonti CMF**
> Version 2.0.0 · Author: **[webitproff](https://github.com/webitproff)** · License: BSD
> Category: Administration · Compatibility: Cotonti V1

---
<img width="1729" height="910" alt="dragstructure-page" src="https://github.com/user-attachments/assets/7ee80ec6-f5de-4960-805e-18cfd899dc5e" />
<img width="1671" height="941" alt="dragstructure-market" src="https://github.com/user-attachments/assets/62deaffd-0ac2-4f3f-8980-7ac680659ead" />


---

## Briefly About the Plugin

**Drag & Drop Structure** is an administrative plugin for Cotonti that turns the routine work with site structure into simple and intuitive drag-and-drop category management.

If you've ever tried to rebuild an online store catalog, reorganize blog sections, or tidy up the article tree through Cotonti's built-in "Structure" section — you know how tedious it is: dozens of text fields, numeric paths, risk of typos and breaking the hierarchy. The plugin **eliminates this pain entirely**: you see a live tree of your categories and simply drag them where you need them.

One mouse click — and the "Gaming Laptops" section moves from "Laptops" into the new "Gaming Hardware" section. All nested subcategories move along with it automatically. The order in the database is recalculated instantly, the site cache is flushed, and the menu and breadcrumbs on the public side immediately show the new result.

**No code. No numeric paths. Just the mouse.**

---

## Who This Plugin Is For

The plugin is designed for **administrators of Cotonti-based sites** who:

- **run an online store** and want to manage the product catalog structure;
- **write a blog or articles** and want to conveniently group their rubrics;
- **develop a forum** and want to rearrange sections without touching the database;
- **manage a portfolio** and want to display works in the desired order;
- **administer any project** with a large number of categories and subcategories.

The plugin **requires no** programming knowledge. If you know how to drag icons on your desktop — you know how to use this plugin.

---

## Key Features

### 🖱️ Drag-and-Drop Categories

A full-featured drag-and-drop interface powered by the SortableJS library. Categories can be dragged anywhere in the tree: above, below, inside another category, or to the top level. Everything is intuitive and visual.

### 🌳 Full Category Tree

Unlike Cotonti's built-in "Structure" section, where categories are displayed as a flat list with indents, the plugin shows a **true tree**: you can see who is whose parent, child, or grandchild. Each level has its own visual grouping.

### 🔄 Automatic Path Recalculation

The internal numeric paths of categories (`structure_path`) are recalculated automatically with each move. The plugin does this according to strict Cotonti rules: root categories are numbered in steps of 10 (`010`, `020`, …), nested ones — in steps of 1 (`001`, `002`, …). You don't need to understand this — just drag and drop.

### 📦 Moving Entire Subtrees

If a category has child sections, and those have their own children, they all **move along with the parent**. Drag once — the whole branch lands in a new place. You don't need to manually drag each descendant.

### 🛠️ One-Click Structure Recovery

The **"Normalize paths"** utility helps if the structure has broken for any reason (duplicate paths, "glued" values after an import error or a failure of a previous plugin version). One click — and all categories receive guaranteed unique clean paths. You can then rebuild the hierarchy by dragging again.

### ⚡ Instant Site Update

After each move, the plugin **flushes the Cotonti cache**. This means changes on the public side (in the menu, breadcrumbs, category pages) are visible immediately — without waiting and without manual cache clearing.

### 🔒 Full Integration with Cotonti Permissions

Access to the plugin is controlled by the built-in permissions system. By default, the page is available only to site administrators. You can grant access to specific groups through the "Rights" section.

### 📝 Action Logging

Every move is recorded in the Cotonti system log: who, when, in which area changed the structure. You can find the entries in the **"Log"** section of the admin panel.

### 🌍 Multilingual

The plugin ships with Russian and English localization. Adding your own language is simple: copy the language file and translate the values.

### 🎯 Works with All Structure Areas

The plugin is **universal** — it works not only with the store or blog, but with **all** Cotonti extensions that support structure: `page`, `market`, `forums`, `folio`, `usercategories`, and any others. One tool — a single interface for all site sections.

---

## What the Plugin Gives You as an Administrator

| Before (without the plugin) | After (with the plugin) |
|---|---|
| Editing `structure_path` manually in a text field | Drag-and-drop with the mouse |
| Risk of typos in numeric paths and breaking the structure | Automatic recalculation — no errors |
| Flat list with indents | True visual tree |
| Manual path recalculation when moving a parent with children | The whole subtree moves in one operation |
| Need to think about the cache | Cache is flushed automatically |
| Errors visible only on the public side | Error immediately shown in a popup |

---

## What the Plugin Does NOT Do — and Why That's Good

The plugin is **intentionally narrowly focused**. It does one job — managing the order and nesting of categories — and does it well. Everything else remains with Cotonti's built-in tools:

- **Creating** new categories — via `admin.php?m=structure`.
- **Deleting** categories — via `admin.php?m=structure`.
- **Editing** titles, descriptions, icons, templates — via `admin.php?m=structure`.
- **Managing access permissions** — via `admin.php?m=rights`.
- **Recalculating element counters** — via `admin.php?m=structure&a=resyncall`.

This separation is a **deliberate architectural decision**. The plugin does not duplicate the core functionality and does not conflict with it. It carefully complements Cotonti where the built-in interface is inconvenient.

**A bonus for you:** the plugin can be safely disabled at any time — the site structure and all data remain untouched. It does not create its own tables in the database and does not modify the core.

---

## How It Looks

The plugin page opens in the admin panel at `admin.php?m=other&p=dragstructure` and contains:

- a **dropdown list** for selecting the structure area (`market`, `page`, `forums`, etc.);
- a **category tree** with drag handles and visual hierarchy;
- a **"Normalize paths"** button for recovering a broken structure;
- an **information panel** with messages about operation results.

---

## Technical Specifications

| Parameter | Value |
|---|---|
| **Extension type** | Plugin (plug) |
| **Cotonti version** | compatible with 1.0.0+ |
| **PHP version** | 8.4+ (8.5+ recommended) |
| **Database** | MySQL 8.4+ |
| **Dependencies** | None required |
| **Own DB tables** | Does not create |
| **Cotonti hooks** | `tools` (admin page), `ajax` (handler) |
| **License** | BSD |
| **Localization** | Russian, English |

### File Structure

```
plugins/dragstructure/
├── dragstructure.setup.php           ← Plugin registration
├── dragstructure.tools.php           ← Admin tool page
├── dragstructure.ajax.php            ← AJAX handler
├── inc/
│   └── dragstructure.functions.php   ← Plugin business logic
├── tpl/
│   └── dragstructure.tools.tpl       ← HTML template
└── lang/
    ├── dragstructure.ru.lang.php
    └── dragstructure.en.lang.php
```

---

## Installation

Installation takes less than a minute:

1. **Upload the plugin files** to the `plugins/dragstructure/` directory of your site.
2. Open **`admin.php?m=extensions`** — the new **Drag & Drop Structure** plugin will appear in the list.
3. Click **"Install"** (activate).
4. Open **"Tools"** in the left admin menu — you will see the **Drag & Drop Structure** item.
5. Done — you can start dragging categories.

If the item does not appear — check that your group has permission for the plugin (granted in `admin.php?m=rights`).

---

## Security

The plugin follows all Cotonti security standards:

- **CSRF protection** — every AJAX request is verified with the built-in Cotonti X-token.
- **Permission checks** — the page and the AJAX handler are protected by `cot_auth`.
- **XSS protection** — all data is escaped when passed to the template.
- **SQL injection** — all queries use prepared statements.
- **Transactions** — the move is performed atomically: either everything is applied, or nothing.

---

## Frequently Asked Questions

**Question:** Does the plugin work on my Cotonti version?
**Answer:** The plugin has not been tested for compatibility with Cotonti versions below the current 1.0.0.

**Question:** Will page URLs break after dragging?
**Answer:** No. The plugin changes only the order and nesting, and **does not touch the category codes** (`code`) that URLs depend on. All links will keep working.

**Question:** What happens if I disable the plugin?
**Answer:** Nothing bad. The plugin has no own database tables and does not modify the core. The site structure will remain in the state you left it in. Disabling affects only the interface.

**Question:** Does the plugin work with multiple site languages?
**Answer:** Yes. The plugin ships with Russian and English localization. If necessary, you can add other languages by copying and translating the language file.

**Question:** What to do if the structure breaks?
**Answer:** Use the **"Normalize paths"** button — it will rebuild all paths into a clean flat form. After that, the hierarchy can be rebuilt by dragging. See more in the "Category Sorting Order Using the Plugin" section below.

**Question:** Can I drag categories containing products?
**Answer:** Yes. Dragging a parent category automatically moves its entire subtree. The products themselves **do not leave their category** — they remain attached to their section and simply move along with it.

**Question:** Do I need special knowledge or programming skills?
**Answer:** No. The plugin is fully ready to use and requires neither file edits nor code configuration. Everything is done with the mouse in the admin panel.

---

## Support and Updates

- **Documentation:** section "Category Sorting Order Using the Plugin" below.
- **Compatibility:** the plugin follows Cotonti 1.0.0 standards and does not use deprecated calls.
- **Updates:** when a new Cotonti version is released, the plugin is updated first.

If something goes wrong — contact your site administrator or the official Cotonti forum, attaching:

- a screenshot of the plugin page;
- the error text (if any);
- an entry from the system log;
- the Cotonti and PHP versions.

---

## Summary

**Drag & Drop Structure** is a small but exceptionally useful plugin that turns working with site structure from technical routine into a pleasant and visual action. If you administer a Cotonti site and have more than ten categories — this plugin will save you hours of time and dozens of nerve cells.

**Install it once — and never return to manual editing of numeric paths again.**

---

# Category Sorting Order Using the Plugin

## A Simple Guide for the Online Store Administrator

> **Who this section is for:** for the site administrator who manages a product catalog or blog via Cotonti. Not for a programmer. There is no code here — only what you see on the screen and what you need to do with your mouse.

---

## What "Category Order" Is and Why It Matters

Any online store or blog consists of **categories** — sections into which products or articles are distributed. For example, an electronics store has sections "Computers", "Laptops", "Smartphones", and inside them — subsections like "Gaming Laptops", "Ultrabooks", "Workstations".

In Cotonti, every category has two important properties:

1. **Where it is located** — in which parent section (or at the very top, at the main level).
2. **In what order it stands** — which category is displayed first, which second, which last.

Both can be changed manually through the built-in "Structure" section of the admin panel — but there it is done via inconvenient numbers and text fields. The **Drag & Drop Structure** plugin turns this work into simple mouse dragging: you take a category and place it where you need it — just like dragging icons on your desktop.

**Why change order and nesting at all:**

- To **keep important sections at the top** — for example, "Sales" or "New Arrivals" first in the menu.
- To **logically group products** — for example, place "Gaming Laptops" inside "Laptops" instead of keeping them in a common list.
- To **tidy up after an import** — if categories were loaded mixed up.
- To **change the catalog structure** for a season or a new product line.

---

## How to Open the Plugin Page

1. Go to the site admin panel — `your-site.com/admin.php`.
2. In the left menu, select the **"Tools"** section (or "Other").
3. Find the **"Drag & Drop structure"** item — that's our plugin.
4. A page with the category tree will open.

If you do not see the item in the menu — it means your account does not have permission for the plugin. Contact the site super administrator to grant permissions.

---

## What You See on the Page

At the top of the page there is a **dropdown list "Extension"**. It lists all structure areas of the site: `page` (pages and articles), `market` (online store), `forums` (forums), `folio` (portfolio), etc.

- For an online store, select **`market`**.
- For a blog or articles — **`page`**.

After selecting in the list, the page **redraws** and shows the category tree of exactly that area.

**What a category tree is:**

Each category looks like a rectangular tile approximately like this:

```
⋮⋮  001.001.001  gaming-desktops — Gaming Desktops
                  High-performance gaming PCs.
```

What is what here:

| Element | What it is |
|---|---|
| `⋮⋮` (on the left) | **Handle** — you drag with it |
| `001.001.001` | Technical number (path) — for the administrator this is just a reference point, don't touch it |
| `gaming-desktops` | Category code (in Latin) — used in page addresses |
| **Gaming Desktops** | Category title — what visitors see |
| Small gray text below | Category description |

Nested categories are shown **indented to the right** with a vertical line on the left — so you can see who is nested in whom.

At the very bottom of each category there is an **empty gray zone** — you can drag another category there, and it will become a child.

---

## The Main Operation: How to Drag a Category

Everything is done with the **mouse** — no "up/down" buttons to press.

1. **Grab the category by the handle.** Move the cursor to the `⋮⋮` icon to the left of the title. The cursor will turn into a "paw". Press and hold the left mouse button **and do not release it**.
2. **Pull.** The category will "detach" from its place and follow the cursor. It will be shown semi-transparent — so you see you're dragging exactly it.
3. **Point at the desired place.** A **gray hint bar** will appear — this is where the category will land if you release the button now.
4. **Release the mouse button.**

After 1–3 seconds you will see the tree redrawn in the new order. This means the changes have already been saved on the server.

> **Important:** if something goes wrong (for example, the server returned an error), you will see a popup with the error text, and the page will reload. Don't panic — this is protection. Just try again.

---

## Example on Real Store Categories

Let's go through this with a specific electronics online store catalog. We have five root sections:

```
001  Computers & Components
002  Laptops
003  Smartphones
004  Game Consoles
005  Accessories
```

And each has its own subsections. For example, `Laptops`:

```
002.001  Gaming Laptops
002.002  Ultrabooks
002.003  Workstations
```

And `Gaming Laptops`:

```
002.001.001  High-End Gaming
002.001.002  Mid-Range Gaming
002.001.003  Budget Gaming
```

Now — the scenarios.

---

### Scenario 1. Swap Two Subsections

**Task:** we want **"Ultrabooks"** to go **before** "Gaming Laptops" in the "Laptops" block (because ultrabooks are bought more often).

**Before:**

```
Laptops
├── Gaming Laptops
├── Ultrabooks
└── Workstations
```

**What we do:**

1. Find `Ultrabooks` in the tree.
2. Grab by the `⋮⋮` handle and drag it up until the gray bar is **above** "Gaming Laptops".
3. Release.

**After:**

```
Laptops
├── Ultrabooks
├── Gaming Laptops
└── Workstations
```

The order has changed. At the same time **all three categories remain inside "Laptops"** — the nesting has not changed. Only the display order changed.

**What's important to know:**

- Category codes (`ultrabooks`, `gaming-laptops`) **have not changed**.
- Page links **have not broken** — all bookmarks and search engine links work.
- On the public side of the site, the menu and breadcrumbs will immediately show the new order.

---

### Scenario 2. Move a Subsection to a Different Parent

**Task:** the "Gaming Laptops" section needs to be moved from "Laptops" into a new section **"Gaming Hardware"** (which you have just created in the built-in "Structure" section).

**Before:**

```
Laptops
└── Gaming Laptops
    ├── High-End Gaming
    ├── Mid-Range Gaming
    └── Budget Gaming
```

**What we do:**

1. Find `Gaming Laptops` in the tree.
2. Grab by the `⋮⋮` handle.
3. Drag it down to the new category `Gaming Hardware` — **not onto it, but inside it**. When you hover over the gray empty zone under the name `Gaming Hardware`, a hint "here" will appear.
4. Release.

**After:**

```
Gaming Hardware
└── Gaming Laptops
    ├── High-End Gaming
    ├── Mid-Range Gaming
    └── Budget Gaming
```

**Note:** "High-End Gaming", "Mid-Range Gaming", and "Budget Gaming" **have moved along with their parent**. The plugin automatically moves the entire subtree. You don't need to manually drag each of them.

---

### Scenario 3. Promote a Subsection to the Top Level

**Task:** the "Accessories" section (currently inside "Computers") should be promoted to a **separate root section** — because it has grown over the year and deserves its own entry in the main menu.

**Before:**

```
Computers & Components
├── Desktop Computers
├── Computer Components
├── Peripherals
└── Accessories
    ├── Computer Accessories
    ├── Smartphone Accessories
    └── Gaming Accessories
```

**What we do:**

1. Find `Accessories` (the one inside "Computers & Components" — do not confuse with a root one, if any exists).
2. Grab by the `⋮⋮` handle.
3. Drag it down into the **root zone** — below all other root categories (`Computers`, `Laptops`, `Smartphones`, `Game Consoles`). A gray bar will appear between the root categories.
4. Release.

**After:**

```
Computers & Components
├── Desktop Computers
├── Computer Components
└── Peripherals

Laptops
Smartphones
Game Consoles

Accessories                          ← now a root
├── Computer Accessories
├── Smartphone Accessories
└── Gaming Accessories
```

**Note:** the "Accessories" section now stands **on the same level** as "Computers", "Laptops", and other root sections. And again — all its child categories moved along with it.

---

### Scenario 4. Move Smartphones Above Laptops

**Task:** we want "Smartphones" to be in **second place** in the store's main menu, right after "Computers". Currently they are in third place.

**Before:**

```
1. Computers & Components
2. Laptops
3. Smartphones
4. Game Consoles
5. Accessories
```

**What we do:**

1. Find `Smartphones`.
2. Grab by the handle.
3. Drag up until the gray bar is **between "Laptops" and "Computers"** (that is, above Laptops).
4. Release.

**After:**

```
1. Computers & Components
2. Smartphones
3. Laptops
4. Game Consoles
5. Accessories
```

All smartphone subsections (Android Phones, iPhones, Rugged Phones, and their children) have automatically kept their position inside "Smartphones".

---

### Scenario 5. Group All Gaming Content into One Section

**Task:** gaming-related sections are currently scattered: "Game Consoles", "Gaming Laptops" (inside laptops), "Gaming Keyboards" (inside accessories). We want to gather everything into one root section **"Gaming"**.

**Sequence of actions:**

1. In the built-in "Structure" section, create a new root section `Gaming`.
2. In the plugin, grab `Game Consoles` (root) and drag it into the new `Gaming`.
3. Find `Gaming Laptops` (inside Laptops) and also drag it into `Gaming`.
4. Find `Gaming Accessories` (inside Accessories) and move it into `Gaming` too.
5. Inside `Gaming`, arrange the order: Game Consoles → Gaming Laptops → Gaming Accessories.

**What you get:**

```
Gaming
├── Game Consoles
│   ├── Home Consoles
│   ├── Handheld Consoles
│   └── Console Accessories
├── Gaming Laptops
│   ├── High-End Gaming
│   ├── Mid-Range Gaming
│   └── Budget Gaming
└── Gaming Accessories
    ├── Gaming Keyboards
    ├── Gaming Mice
    ├── Gaming Chairs
    └── VR Headsets
```

At the same time, these subsections will no longer be in their original sections ("Laptops", "Accessories") — they have moved entirely.

---

## What Happens After Dragging

You released the mouse. What happens "under the hood":

1. **The plugin saves the new order in the database.** Instantly, automatically, without your involvement.
2. **The tree on the page is redrawn.** If something went wrong — you will see an error.
3. **The menu and breadcrumbs on the public side are updated.** The next visitor will see the new order.
4. **The site cache is flushed.** That's why changes are visible immediately, without waiting.
5. **An entry is added to the admin log.** In the "Log" section (`admin.php?m=logger`) you can see: who, when, and in which area changed the structure.

**What does NOT change:**

- **Category titles** — remain the same.
- **Descriptions and icons** — remain the same.
- **Category codes** (`code`) — remain the same, so **all page URLs are preserved**. If you had a link `site.com/market/gaming-desktops`, it will keep working.
- **Access permissions** — remain the same.
- **Products** — remain in their categories, nothing is moved.

Only **one thing** changes — the order and nesting in the tree. The plugin does not touch anything else.

---

## The "Normalize Paths" Button — What It Is and When to Use It

At the top of the plugin page there is a red **"Normalize paths"** button. It does a **very serious thing**: **erases all nesting** and turns the tree into a flat list.

**What this means in simple terms:** all categories become **root**. No subsections remain. The internal content (products, articles) is not deleted, but the structure becomes flat:

**Before:**

```
Computers & Components
├── Desktop Computers
│   ├── Gaming Desktops
│   └── Office Desktops
└── Peripherals
    ├── Keyboards
    └── Mice
```

**After "Normalization":**

```
Computers & Components
Desktop Computers
Gaming Desktops
Office Desktops
Peripherals
Keyboards
Mice
```

Everything on one level, order — by numbers, ascending.

### When This Is Needed

**Only in one case:** when the structure has "broken". Signs of breakage:

- **Duplicate paths** appeared in the tree — for example, two categories with the same number `001`. In such a situation the plugin cannot work correctly.
- Categories **disappeared from the tree** or are displayed in wrong places.
- You see an **error** when trying to drag, and it doesn't go away.
- The structure was **imported from another CMS** and contains garbage path values.

### When NOT to Do This

- **Just like that** — "just in case". This will erase your nesting that you may have been building for months.
- **Before an important launch** — don't.
- **If it seems to you that "something has become wrong"** — first make sure the problem is really in the structure and not in something else.

### What to Do If You Clicked Anyway

The plugin will ask for confirmation — **read the text carefully** in the dialog. It says that the hierarchy will be lost. If you're not sure — click **"Cancel"**.

If you confirmed — within 2–3 seconds all categories will become root. Then:

1. **Don't panic.** The data is not deleted.
2. **Restore nesting manually** — by dragging. Start with large sections, then subsections, then grandchildren.
3. **Check the public side** — the menu and breadcrumbs will immediately show the new state.

**Tip:** before clicking "Normalize", take a **screenshot of the tree**. It takes 10 seconds, but if something goes wrong — you'll have a cheat sheet of how it was.

---

## Common Mistakes and How to Avoid Them

### Mistake 1. "I dragged, but nothing happened"

**Cause:** most likely, you **did not grab the handle** `⋮⋮` but tried to drag by the title. Or grabbed the handle but didn't press and hold the mouse button.

**Solution:** grab strictly by `⋮⋮` to the left of the title, press and hold while dragging.

### Mistake 2. "I dragged, and the category disappeared"

**Cause:** you dragged it **inside another category**, and now it's not at the top level but inside. Expand the appropriate parent — the category is there.

**Solution:** if you want to bring it back up — grab the handle again and drag to the root zone (below all root categories, between them).

### Mistake 3. "An error popped up while dragging, and the page reloaded"

**Cause:** most often this means that **while you were dragging**, someone else (or you in another tab) changed the structure, and the data on the page became stale.

**Solution:** the page reloaded — it already shows up-to-date data. Just repeat the action.

If the error repeats — read the text. It often says "Cannot move category into its own descendant" — this means you are trying to nest a parent into its own child. That's not allowed — it would create an infinite loop. Drag it to a **different** place.

### Mistake 4. "The category doesn't want to move, something seems to hold it"

**Cause:** you may be trying to place a category **into itself** or **into its own child section**. The plugin blocks this.

**Solution:** check where exactly you are dragging. If the parent is the category itself or its child, choose a different place.

### Mistake 5. "After dragging, the menu on the public side did not update"

**Cause:** most likely, it's a cache on the browser side or an external proxy (Cloudflare, Varnish, nginx).

**Solution:** refresh the page with a forced reload — `Ctrl + F5` (Windows/Linux) or `Cmd + Shift + R` (Mac).

If it didn't help — contact the server administrator; the server cache may need to be flushed.

### Mistake 6. "I accidentally clicked 'Normalize', and everything broke"

**Cause:** you clicked the button and confirmed that you're ready to lose the hierarchy.

**Solution:** restore it manually. The plugin doesn't keep history and cannot undo. If you have a **database backup** — restore only the `structure` table via phpMyAdmin. That's the fastest way.

**Tip:** remove the "Normalize" button from the template if it's not needed — delegate this task to the administrator who knows exactly what they're doing. Technically it's one line in the template file.

---

## Safe Working Rules with the Plugin

Read these rules — they will save you hours.

**Rule 1. Make changes one at a time.**

Don't drag five categories in a row in 10 seconds. Dragged one — see what happened, wait for the tree to be redrawn. Then the next.

**Rule 2. Don't work with the plugin if someone else is editing the structure.**

If you have multiple administrators — agree on who works at what time. Parallel moves may cause an error.

**Rule 3. Don't rename categories in the plugin — that's not its job.**

The plugin **does not** change titles, descriptions, icons. That's what the built-in "Structure" section is for. Don't try to find a "title" field in the plugin — there isn't one.

**Rule 4. Don't delete categories in the plugin — that's not its job.**

The plugin **does not** delete categories. For deletion — the built-in "Structure" section.

**Rule 5. Don't touch the `system` category.**

If you have a section with the code `system` in your tree — that's a Cotonti service section (it stores system pages). You **can** drag it, but **shouldn't**: it may break service links. Leave it alone.

**Rule 6. Before major reorganization — make a backup.**

Before rebuilding a catalog hierarchy of 200+ categories, ask the hoster or administrator to make a database backup. It takes a minute and will save you if something goes wrong.

**Rule 7. Don't touch the "Normalize" button unless necessary.**

Use it only if the structure is broken. See the section above.

**Rule 8. After major changes — check the public side.**

Walk through the site as a visitor: main menu, breadcrumbs, category pages. Make sure everything looks the way you planned.

---

## "What Happens to the Site" Table for Different Actions

| Your action | Menu | Breadcrumbs | URLs | Products/Articles | Permissions |
|---|---|---|---|---|---|
| Swapping neighbors | order changes | unchanged | **unchanged** | stay in place | unchanged |
| Moving to another parent | nesting changes | path changes | **unchanged** | stay in the same category | unchanged |
| Moving to root | category appears in main menu | path shortens | **unchanged** | stay | unchanged |
| Moving with subcategories | whole subtree moves | paths of all descendants change | **unchanged** | stay | unchanged |
| "Normalize" | all sections become root | paths shorten to one segment | **unchanged** | stay | unchanged |

Key point: **page addresses and category content never suffer**. Only the external order and nesting change.

---

## Step-by-Step Checklist for a Typical Task

Suppose you want to **rebuild the store catalog for a New Year sale**: bring "Accessories" and "Gaming products" to the top, and move "Computers" down.

**Step 1. Preparation**

- [ ] Open `admin.php?m=other&p=dragstructure`.
- [ ] In the "Extension" list, select `market`.
- [ ] Take a screenshot of the current tree (in case of rollback).

**Step 2. Promote Accessories**

- [ ] Find `Accessories`.
- [ ] Drag to the very top of the tree.
- [ ] Make sure the category is above all root sections.
- [ ] Verify: accessory subsections moved along with it.

**Step 3. Promote Gaming**

- [ ] Find `Game Consoles`.
- [ ] Drag to second from the top, right under `Accessories`.
- [ ] If necessary — group with gaming laptops and accessories (as in scenario 5).

**Step 4. Demote Computers**

- [ ] Find `Computers & Components`.
- [ ] Drag it down, below all other root sections.
- [ ] Make sure the subsections (Desktop, Components, Peripherals) moved with it.

**Step 5. Verification**

- [ ] Open the public side of the site.
- [ ] Check the main menu — the order matches the plan.
- [ ] Walk through 2–3 categories — breadcrumbs work.
- [ ] Open a couple of products — URLs have not changed.
- [ ] If something's wrong — go back to the plugin and fix it.

**Step 6. If the Result Is Not Satisfying**

- [ ] Don't panic.
- [ ] Drag back (all actions are reversible, except "Normalization").
- [ ] If the structure is completely broken — restore from backup.

---

## What to Do If Something Goes Completely Wrong

**Situation 1. The tree doesn't display.**

Check: is `ext` selected in the list. If the list is empty — it means no extension has declared a structure. Contact the administrator: perhaps the `market` or `page` module needs to be activated.

**Situation 2. A category hangs "in the air" — not in a parent, but not in the root either.**

This is a sign of a corrupted structure. Try:

1. Open the built-in "Structure" section and find this category.
2. Look at its `path` — it should be like `001.002`, not `001..002` or with other errors.
3. If the path is broken — click "Normalize" (yes, this is the only case when it's worth risking).
4. After normalization, rebuild the hierarchy.

**Situation 3. Nothing helps.**

Contact the plugin developer or the Cotonti forum. Attach:

- a screenshot of the plugin page;
- the error text (if any);
- an entry from the log;
- the Cotonti and PHP versions.

---

## Summary: Quick Cheat Sheet

For those who read to the end — the condensed version.

1. **Where to open:** admin panel → "Tools" → "Drag & Drop structure".
2. **What to select:** at the top, a dropdown — your area (`market`, `page`, etc.).
3. **How to drag:** by the `⋮⋮` handle → pull → release on the gray bar.
4. **What changes:** only order and nesting. **Nothing else.**
5. **What does NOT change:** URLs, titles, content, permissions.
6. **Where to drag:** inside a category — becomes a child; between categories — neighbor; into the root zone — becomes a root.
7. **The red "Normalize" button** — only for a broken structure. Don't touch it unnecessarily.
8. **One rule:** do one action at a time and check the result.

Happy sorting!
