# Drag & Drop Structure — Visual Category Editor for Cotonti

> **Extension for Cotonti CMF**
> Version 2.0.1  
> Date: Oct 29, 2026  
> Author: **[webitproff](https://github.com/webitproff)**  
> License: BSD  
> Category: Administration · Compatibility: Cotonti V1  

---
<img width="1729" height="910" alt="dragstructure-page" src="https://github.com/user-attachments/assets/7ee80ec6-f5de-4960-805e-18cfd899dc5e" />
<img width="1671" height="941" alt="dragstructure-market" src="https://github.com/user-attachments/assets/62deaffd-0ac2-4f3f-8980-7ac680659ead" />
<img width="1920" height="1080" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 25" src="https://github.com/user-attachments/assets/6da2dfee-2a17-4e02-aff8-356be4ae4bfb" />
<img width="1920" height="1080" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 25 (2)" src="https://github.com/user-attachments/assets/472e8a60-64f8-4045-846c-178ddb9edb53" />
<img width="1226" height="855" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 26" src="https://github.com/user-attachments/assets/f1fe80da-f0eb-46a2-9007-4da0e9219ab3" />
<img width="1106" height="801" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 26 (2)" src="https://github.com/user-attachments/assets/d7718da1-7e56-4a07-a991-12f6ecaf8910" />
<img width="1271" height="893" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 26 (3)" src="https://github.com/user-attachments/assets/8b9a26b8-e251-4d58-8ed9-0806c585c844" />
<img width="1334" height="896" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 26 (4)" src="https://github.com/user-attachments/assets/ee090b89-cc6e-4d78-ae45-6b2eeea357f3" />
<img width="1242" height="752" alt="dragstructure_plugin_cotonti_by_webitproff_2026-10-22 07 13 26 (5)" src="https://github.com/user-attachments/assets/bab0e39c-7b36-46ad-bea7-965fddfc5460" />


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



___
> FOR DEVELOPERS
___

# DragStructure: Complete Plugin Guide

> Plugin version: **2.0.0**
> Target platform: **Cotonti CMF V1**
> Author: **[webitproff](https://github.com/webitproff)**
> License: **BSD**

---

## Table of Contents

1. [Introduction](#1-introduction)
2. [The Plugin's Place in Cotonti CMF Architecture](#2-the-plugins-place-in-cotonti-cmf-architecture)
3. [Installation and Configuration](#3-installation-and-configuration)
4. [File Structure](#4-file-structure)
5. [Key Concepts: structure_path, area, code, title](#5-key-concepts-structure_path-area-code-title)
6. [Category Sorting Order Using the Plugin](#6-category-sorting-order-using-the-plugin)
7. [Plugin Components — Detailed Breakdown](#7-plugin-components--detailed-breakdown)
   - 7.1. [dragstructure.setup.php](#71-dragstructuresetupphp)
   - 7.2. [dragstructure.tools.php](#72-dragstructuretoolsphp)
   - 7.3. [dragstructure.tools.tpl](#73-dragstructuretoolstpl)
   - 7.4. [dragstructure.ajax.php](#74-dragstructureajaxphp)
   - 7.5. [inc/dragstructure.functions.php](#75-incdragstructurefunctionsphp)
8. [Data Model and DB Schema](#8-data-model-and-db-schema)
9. [Path Recalculation Algorithms](#9-path-recalculation-algorithms)
10. [Security: CSRF, XSS, Access Permissions](#10-security-csrf-xss-access-permissions)
11. [Localization](#11-localization)
12. [Integration with the Cotonti Core](#12-integration-with-the-cotonti-core)
13. [Usage Scenarios](#13-usage-scenarios)
14. [Limitations and Edge Cases](#14-limitations-and-edge-cases)
15. [Diagnostics and Troubleshooting](#15-diagnostics-and-troubleshooting)
16. [Extension and Customization](#16-extension-and-customization)
17. [Performance](#17-performance)
18. [Comparison with Built-in Cotonti Tools](#18-comparison-with-built-in-cotonti-tools)
19. [Glossary](#19-glossary)
20. [Appendices](#20-appendices)

---

## 1. Introduction

### 1.1. Purpose of the Document

This guide provides an exhaustive technical description of the **DragStructure** plugin for Cotonti Siena CMF — an extension that adds to the Cotonti admin panel a visual editor for the category hierarchy with drag-and-drop support and automatic recalculation of numeric `structure_path` values.

The document is intended for:
- administrators of Cotonti-based sites operating the plugin;
- developers of Cotonti extensions integrating their modules with the structure;
- system integrators performing migrations and data recovery;
- technical writers and maintainers of the project documentation.

### 1.2. Brief Description of the Plugin

**DragStructure** (code `dragstructure`) is an administrative plugin solving one narrow but critically important task: **convenient management of the order and hierarchy of Cotonti structure categories** without the need to manually edit numeric `structure_path` values in the form of the built-in "Structure" section.

Key features:

- Tree-like display of all categories of a selected area (`structure_area`) in the admin panel.
- Dragging categories with the mouse (SortableJS) to any nesting level with automatic path recalculation.
- Automatic renumbering of `structure_path` in numeric format:
  - root categories — three-digit with step 10 (`010`, `020`, `030`, …);
  - nested categories — three-digit with step 1 (`001`, `002`, `003`, …).
- Utility action "Normalize paths" — recovery from a corrupted DB state.
- Instant Cotonti cache flush and logging to the system log.
- Full CSRF and XSS protection, integration with the built-in Cotonti permissions system.

### 1.3. Scope

The plugin is useful in the following situations:

| Scenario | Plugin Value |
|---|---|
| Large catalog (100+ categories) | Mass moves and reorganization without the risk of "breaking" paths |
| Migration from another CMS | Fast hierarchy reconstruction after import |
| Errors of previous plugin/script versions | The "Normalize" button restores operability |
| Structure testing | Trying out hierarchy variants in a couple of clicks |
| Multi-area site (`page`, `market`, `forums`, `folio`, `usercategories`) | A single interface for all areas |

### 1.4. What the Plugin Does **Not** Do

- Does not create or delete categories (those are built-in Cotonti operations).
- Does not manage access permissions (`cot_auth`) — those remain in the core's "Rights" section.
- Does not edit titles, descriptions, icons, or category templates.
- Does not affect `structure_count` (item counters) — those are the responsibility of the area-owning modules via `*_sync()`.
- Does not work in the public part of the site — admin panel only.

---

## 2. The Plugin's Place in Cotonti CMF Architecture

### 2.1. General Cotonti Context

Cotonti is a modular PHP framework (CMF) built on three fundamental concepts:

1. **Extensions** (modules `module` and plugins `plug`) — units of functionality connected through the hooks system.
2. **Structure** — a universal category hierarchy, shared by all extensions (the `*_structure` table).
3. **Events/hooks** — a mechanism for injecting extension code into the core's control points.

In this scheme, the `dragstructure` plugin occupies a **boundary position**:

- it is a **plugin** (`plug`) — registered in the `*_plugins` table, activated via the admin panel;
- it works **with the structure** — that is, with the same table used by the `page`, `market`, `forums`, `folio`, `usercategories` modules;
- it **does not declare its own structure** — it is not in the `cot_getExtensionsWithStructure()` list, which is fundamental: the plugin is not an "area" of the structure, it is merely a tool for managing other areas;
- it is connected through **two hooks**:
  - `tools` — the admin panel entry point;
  - `ajax` — the AJAX request entry point via `plug.php?r=dragstructure`.

### 2.2. Interaction Map

```
┌──────────────────────────────────────────────────────────┐
│                     Administrator                        │
└───────────────┬──────────────────────────────────────────┘
                │ HTTPS
                ▼
┌──────────────────────────────────────────────────────────┐
│ admin.php?m=other&p=dragstructure                        │
│   ↓                                                      │
│   system/admin.php (admin router)                        │
│   ↓                                                      │
│   hook 'tools' — includes dragstructure.tools.php        │
└───────────────┬──────────────────────────────────────────┘
                │ page render
                ▼
┌──────────────────────────────────────────────────────────┐
│ dragstructure.tools.tpl (CATS_JSON, X_TOKEN, AJAX_URL)   │
│   ↓                                                      │
│   JS: SortableJS + fetch()                               │
└───────────────┬──────────────────────────────────────────┘
                │ POST x=… & ext=… & parent_id=… & order[]
                ▼
┌──────────────────────────────────────────────────────────┐
│ plug.php?r=dragstructure                                 │
│   ↓                                                      │
│   hook 'ajax' — includes dragstructure.ajax.php          │
│   ↓                                                      │
│   dragstructure_move()                                   │
│   ├─ dragstructure_validate_move()                       │
│   ├─ dragstructure_apply_order()                         │
│   └─ dragstructure_get_categories()                      │
└───────────────┬──────────────────────────────────────────┘
                │ UPDATE `*_structure`
                ▼
┌──────────────────────────────────────────────────────────┐
│   Table `*_structure` — shared by all extensions         │
└──────────────────────────────────────────────────────────┘
```

### 2.3. Interaction with the Core via the Cotonti API

The plugin actively uses the built-in Cotonti API:

| Function/Class | Purpose in the Plugin |
|---|---|
| `Cot::$db` | Working with `*_structure` via the PDO wrapper `CotDB` |
| `Cot::$cache` | Cache flush after changes (`Cache::clear()`) |
| `Cot::$sys['xk']` | CSRF token |
| `Cot::$L[...]` | Language strings |
| `cot_import()` | Safe GET/POST import |
| `cot_auth()` | Permission check |
| `cot_check_xg()` / `cot_check_xp()` | XSS token check |
| `cot_message()` / `cot_error()` | Message queue |
| `cot_redirect()` | Redirect after action |
| `cot_url()` | URL building |
| `cot_selectbox()` | Building `<select>` |
| `cot_tplfile()` | Template lookup in theme |
| `cot_incfile()` | Including an extension's include-file |
| `cot_langfile()` | Including a language file |
| `cot_log()` | Writing to the system log |
| `cot_getExtensionsWithStructure()` | List of areas supporting structure |
| `cot_die_message()` | Terminal error |
| `cot_block()` | Redirect on missing permission |
| `XTemplate` | CoTemplate template engine |
| `cot_rc()` | Rendering resource strings |

### 2.4. Why This Is a Plugin and Not a Module

A Cotonti module (`module`) is usually a self-contained extension with its own structure and public part. A plugin (`plug`) is an extension injected into others' points through hooks.

`dragstructure` fully matches the definition of a plugin:

- **has no own structure** in `*_structure`;
- **has no public part** (works only in the admin panel);
- **is connected via hooks** `tools` and `ajax`;
- **has no own DB tables**;
- **does not modify Cotonti's composition** — just a convenient UI for existing data.

This is a fundamentally correct architectural decision: the plugin remains a "tool" that can be safely disabled without destroying data.

---

## 3. Installation and Configuration

### 3.1. System Requirements

| Component | Minimum | Recommended |
|---|---|---|
| Cotonti CMF | v0.9.26+ | v1.0.0 |
| PHP | 8.4 | 8.5+ |
| MySQL / MariaDB | 8.0 / 10.2 | 8.4 / 10.6+ |
| PHP extensions | `mbstring`, `PDO`, `json` | + `intl` (for localization) |
| Browser | Any with ES2017 support | Latest Chrome/Edge/Firefox |
| SortableJS | Loaded from CDN or admin theme | Local version 1.15.2+ |

### 3.2. Installation

**Method 1. Through the admin panel**

1. Go to `admin.php?m=extensions`.
2. Make sure the `plugins/dragstructure/` directory is uploaded to the site root.
3. Find the plugin in the "Plugins" list — it will appear automatically after the list is refreshed.
4. Click "Install" (activate).

**Method 2. Manually**

1. Place the plugin files into `plugins/dragstructure/`.
2. In the admin panel go to "Extensions" → "Plugins".
3. Activate `dragstructure`.

After activation:

- the plugin will appear in the **"Tools"** section (`admin.php?m=other`);
- its permission settings (Auth_guests/Auth_members) will be registered in the Cotonti system.

### 3.3. Permission Configuration

The `dragstructure.setup.php` file contains the `[BEGIN_COT_EXT]` block with parameters:

```
Auth_guests=R
Lock_guests=12345A
Auth_members=RW
Lock_members=12345A
```

What this means:

- **Auth_guests=R** — guests are granted "read" on the plugin's permissions (technically a guest cannot access the admin panel, but the flag is recorded);
- **Auth_members=RW** — registered users receive R and W by default;
- **Lock_*** — locked permission masks for guests and users.

**In practice**, access to `admin.php?m=other&p=dragstructure` is verified by **two** conditions (in `dragstructure.tools.php`):

```php
cot_block(cot_auth('admin', 'a') || cot_auth('plug', 'dragstructure', 'A'));
```

That is, a site administrator (`admin.a`) or a user with permission `A` (admin) on the plugin gets access. Permission groups are assigned in the Cotonti **"Rights"** section (`admin.php?m=rights`).

**Recommended setup for a production site:**

- permission `A` on `dragstructure` — only for the "Administrators" group (usually COT_GROUP_SUPERADMINS = 5);
- permissions `R`/`W` — grant to no one but administrators, because the plugin modifies the structure.

### 3.4. Verifying Operability

1. Open `admin.php?m=other&p=dragstructure`.
2. Make sure the "Extension" dropdown lists areas (`page`, `market`, `forums`, `folio`, `usercategories`, etc.).
3. Make sure the category tree has rendered.
4. Drag one category, check the `structure_path` change in the DB and the entry in the log (`admin.php?m=logger`).

---

## 4. File Structure

```
plugins/dragstructure/
├── dragstructure.setup.php           # Plugin registration
├── dragstructure.tools.php           # Admin tool page
├── dragstructure.ajax.php            # AJAX handler
├── inc/
│   └── dragstructure.functions.php   # Business logic (plugin API)
├── tpl/
│   └── dragstructure.tools.tpl       # HTML template
└── lang/
    ├── dragstructure.ru.lang.php     # Russian language strings
    └── dragstructure.en.lang.php     # English language strings
```

### 4.1. Purpose of Files

| File | Type | Purpose |
|---|---|---|
| `dragstructure.setup.php` | Metadata | Registers the plugin in Cotonti, sets default permissions |
| `dragstructure.tools.php` | Hook `tools` | Admin page entry point, template rendering |
| `dragstructure.ajax.php` | Hook `ajax` | Receiving POST requests from JS, JSON response |
| `inc/dragstructure.functions.php` | API | Business logic (5 functions) |
| `tpl/dragstructure.tools.tpl` | Template | HTML+CSS+JS of the admin page |
| `lang/*.lang.php` | Localization | Language strings |

### 4.2. Path Resolution in Cotonti

The plugin uses built-in Cotonti functions for path resolution:

```php
require_once cot_incfile('dragstructure', 'plug');   // → plugins/dragstructure/inc/dragstructure.functions.php
require_once cot_langfile('dragstructure', 'plug'); // → plugins/dragstructure/lang/dragstructure.ru.lang.php
$t = new XTemplate(cot_tplfile('dragstructure.tools', 'plug', true));
                                                    // → themes/<admin>/plugins/dragstructure/dragstructure.tools.tpl
                                                    //   plugins/dragstructure/tpl/dragstructure.tools.tpl
```

`cot_tplfile()` with the third argument `true` enables searching in the **admin theme**, allowing an administrator to override the template without touching the plugin sources.

---

## 5. Key Concepts: structure_path, area, code, title

Before analyzing the plugin logic, one must thoroughly understand the Cotonti data model. The plugin manipulates primarily the `structure_path` field, so without understanding this concept the further breakdown is meaningless.

### 5.1. The `*_structure` Table

A prefixed table, for example `x92374_structure`:

```sql
CREATE TABLE `x92374_structure` (
  `structure_id`        mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `structure_area`      varchar(64)  NOT NULL,       -- 'page', 'market', 'forums', ...
  `structure_code`      varchar(255) NOT NULL,       -- 'news', 'articles', 'php'
  `structure_path`      varchar(255) NOT NULL,       -- '001', '001.002', '980.010'
  `structure_tpl`       varchar(128) DEFAULT '',     -- template name or 'same_as_parent'
  `structure_title`     varchar(255) NOT NULL,       -- 'News', 'Articles'
  `structure_desc`      text,                        -- arbitrary description
  `structure_icon`      varchar(128) DEFAULT '',     -- icon path
  `structure_locked`    tinyint UNSIGNED DEFAULT 0,  -- 0/1 — locked or not
  `structure_count`     mediumint UNSIGNED DEFAULT 0 -- item counter
);
```

**Key fields for the plugin:**

- `structure_id` — primary key, used as the node identifier in JS (`data-id`).
- `structure_area` — the area the category belongs to.
- `structure_code` — the symbolic code of the category (e.g., `news`); forms the URL (`index.php?e=page&c=news`).
- `structure_path` — **the main field** determining the hierarchy and order.
- `structure_title` — display title.

The fields `structure_tpl`, `structure_desc`, `structure_icon`, `structure_locked`, `structure_count` are **not modified** by the plugin — it touches only `structure_path` and, indirectly, a service field for transactions.

### 5.2. What `structure_path` Is

`structure_path` is a **numeric sequence separated by dots**. Each segment is a three-digit number (with leading zeros). Example:

| id | code | path | title | Level |
|---|---|---|---|---|
| 1 | `root1` | `010` | Root 1 | 0 |
| 2 | `root2` | `020` | Root 2 | 0 |
| 3 | `child1` | `010.001` | Child 1 | 1 |
| 4 | `child2` | `010.002` | Child 2 | 1 |
| 5 | `grandchild` | `010.001.001` | Grandchild | 2 |
| 6 | `root3` | `030` | Root 3 | 0 |

**Interpretation rules:**

1. **Path length** (number of dots + 1) — nesting level:
   - `010` — level 0 (root);
   - `010.001` — level 1;
   - `010.001.001` — level 2.

2. **Parent** — the path without the last segment:
   - for `010.001` the parent is `010`;
   - for `010.001.001` the parent is `010.001`;
   - `010` has no parent (root).

3. **Sort order** — lexicographic by `structure_path`:
   - `010` < `020` < `030`;
   - `010.001` < `010.002` < `010.003`;
   - `010.001.001` < `010.001.002`.

4. **DB sort** — `ORDER BY structure_path ASC, structure_code ASC`. This is exactly what `cot_load_structure()` and all Cotonti selections use.

### 5.3. Structure Area (`structure_area`)

`structure_area` is the code of the extension the category belongs to. Cotonti supports **multiple independent areas** within one table:

- `page` — categories of the Pages module;
- `market` — categories of the Market (marketplace) module;
- `forums` — categories (sections) of the Forums module;
- `folio` — categories of the Folio module;
- `usercategories` — user categories (Usercategories plugin);
- plus any other extensions that declared the `structure.extensions` hook.

Each area has its **own path space** — `structure_path` is unique within one area but may coincide across areas.

### 5.4. The Notions of "code" and "title"

- **code** — a machine identifier, stable, used in URLs. Usually Latin letters, digits, hyphen.
- **title** — a human-readable name, may contain any characters.

`code` **does not change** when dragging — the plugin works only with `path`. This is critical: all links in the public part of the site (`index.php?e=page&c=news`) remain valid.

### 5.5. The Cotonti Logical Model

Structure loading (`cot_load_structure()` in `system/functions.php`) builds an associative array:

```php
Cot::$structure[$area][$code] = [
    'path'   => '010.001',           // full path
    'tpath'  => 'Root 1 / Child 1',  // title path
    'rpath'  => '010.001',           // raw path (same as path)
    'id'     => 3,
    'tpl'    => 'page',
    'title'  => 'Child 1',
    'desc'   => '',
    'icon'   => '',
    'locked' => 0,
    'count'  => 0,
];
```

The plugin **does not modify** this array — it is recalculated by `cot_load_structure()` on every request.

---

## 6. Category Sorting Order Using the Plugin

This section is central to the documentation, since order and hierarchy are precisely the plugin's domain.

### 6.1. Three Levels of "Order" in Cotonti

Understanding requires distinguishing three concepts:

1. **DB order** (`ORDER BY structure_path`).
2. **Cache order** (`Cot::$structure`, sorted on load).
3. **UI order** (the DOM tree in the admin panel, built from `CATS_JSON`).

The plugin ensures **consistency of all three**: after a move, all three levels are recalculated from a single source — `structure_path`.

### 6.2. Numeric Format Rule

The `structure_path` format in the plugin:

- **root level**: segment = `sprintf('%03d', position * 10)` — that is **`010`, `020`, `030`, …, `100`, `110`, …** with step **10** and width **3**.
- **nested level**: segment = `sprintf('%03d', position)` — that is **`001`, `002`, `003`, …, `999`** with step **1** and width **3**.
- **full path**: `parentPath . '.' . segment`.

**Why step 10 for roots and step 1 for children?**

- **Roots** are sorted with a reserve: if a new root needs to be inserted between `020` and `030`, one can insert `025` without recalculating neighbors.
- **Children** — dense numbering, because adding children is a frequent operation, and Cotonti expects dense paths for sorting without "gaps".

**Example:**

| id | code | path | Level |
|---|---|---|---|
| 1 | `a` | `010` | 0 |
| 2 | `b` | `020` | 0 |
| 3 | `c` | `030` | 0 |
| 4 | `a1` | `010.001` | 1 |
| 5 | `a2` | `010.002` | 1 |
| 6 | `a1x` | `010.001.001` | 2 |
| 7 | `b1` | `020.001` | 1 |

### 6.3. Sorting Scenarios

#### 6.3.1. Swapping Neighbors in the Same Container

**Action**: drag `a1` (path `010.001`) below `a2` (path `010.002`) in container `010`.

**Payload**: `parent_id=1` (parent id), `order=[5, 4]` (`a2` first, then `a1`).

**Result**:

| id | path before | path after |
|---|---|---|
| 4 (`a1`) | `010.001` | `010.002` |
| 5 (`a2`) | `010.002` | `010.001` |

**Internals** (see `dragstructure_apply_order`):

1. `movingIds = {4, 5}`.
2. `usedPaths = all paths except 4 and 5`.
3. For `order=[5, 4]` in container `010`:
   - `pos=1` → `candidate = "010.001"` (free, since `010.001` was the path of `a1`, which is being moved);
   - `pos=2` → `candidate = "010.002"`.
4. **Phase 1 (temporary paths)**: both categories get `_t_<random>_<id>` to avoid a UNIQUE conflict if `structure_path` has a unique index (the current Cotonti schema doesn't have one, but the plugin protects against the future).
5. **Phase 2 (final paths)**: `a2` → `010.001`, `a1` → `010.002`.

#### 6.3.2. Moving to a Different Parent (Without Changing Level)

**Action**: drag `b1` (path `020.001`, parent `020`) into `010` (id 1).

**Payload**: `parent_id=1`, `order=[…, 7]` (in the new order of children of `010`).

**Result**: `b1`'s path prefix changes from `020.001` to `010.<segment>`. The segment is chosen by `pos` in the `order` inside `010`.

**Important**: `b1` keeps its children (if any) — the plugin **recursively** recalculates descendants (`walkChildren`), because their paths begin with `020.001.` and become invalid.

#### 6.3.3. Moving to a Higher Level (to Root)

**Action**: drag `a1` (path `010.001`) into the root container (`parent_id=0`).

**Payload**: `parent_id=0`, `order=[1, 2, 3, 4]` (the new order of roots).

**Result**: `a1` gets a path like `040` (the next free one with step 10). The former `010.001` is freed for other uses.

#### 6.3.4. Moving with Descendants

**Action**: drag `a` (path `010`, has children `010.001`, `010.001.001`) into root `b` (path `020`, if `b` becomes the new parent).

**Payload**: `parent_id=2` (id `b`), `order=[…]`.

**Result**:

- `a` gets path `020.<segment>`;
- `a1` gets path `020.<segment>.001`;
- `a1x` gets path `020.<segment>.001.001`.

**Internal steps** (`dragstructure_apply_order`):

1. Collect `movingIds = {a, a1, a1x}` (root + all descendants via `LIKE '010.%'`).
2. All their old paths are excluded from `usedPaths`.
3. For `a`, `candidate = "020.<next>"` is assigned.
4. `walkChildren(a, "020.<next>")` recursively assigns paths to children.

#### 6.3.5. Moving into Its Own Descendant (Forbidden)

**Action**: drag `a` (path `010`) into `a1` (path `010.001`) — this would create a cycle.

**Result**: `dragstructure_validate_move()` returns the error `Cannot move category into its own descendant`, AJAX responds `{success:false}`, JS calls `alert()` and `location.reload()`.

**Check**:

```php
if (strpos($parentPath . '.', $childPath . '.') === 0) {
    return 'Cannot move category into its own descendant';
}
```

Here `parentPath = "010.001"`, `childPath = "010"`. After concatenation: `"010.001."` starts with `"010."` → error.

#### 6.3.6. Moving into Itself (Forbidden)

`in_array($parentId, $order, true)` — if the id of a moved node matches the id of the new parent, the operation is rejected with `Cannot move category into itself`.

### 6.4. UI Sort Order (Visual)

The frontend (JS in the template) builds the tree from `CATS_JSON`:

```javascript
function buildByParent(cats) {
    const byParent = {};
    cats.forEach(c => {
        const key = c.parentPath || '';
        (byParent[key] = byParent[key] || []).push(c);
    });
    Object.keys(byParent).forEach(k => {
        byParent[k].sort((a, b) => a.path.localeCompare(b.path, undefined, { numeric: true }));
    });
    return byParent;
}
```

**What `localeCompare(…, {numeric: true})` does:**

- String comparison taking numbers into account: `"010"` < `"020"`, `"020"` < `"100"`.
- Without `{numeric: true}` sorting would be byte-lexicographic, which for paths with leading zeros often coincides but for long paths may differ.
- Using `numeric:true` ensures `"010.002"` comes after `"010.001"`.

**Why sorting is done again on the client instead of just following the JSON order?**

- The JSON already arrives sorted (`ORDER BY structure_path ASC`), but
- **after dragging**, the client updates `parentPath` values, and the order in the array may temporarily diverge from the true one. Re-sorting on the client ensures correct display.

### 6.5. Sort Order in DB and Cache

**In DB** — `ORDER BY structure_path ASC, structure_code ASC`. The `structure_code` field is a secondary sort key to ensure determinism when paths are equal (should not happen, but a safeguard).

**In cache** — `cot_load_structure()` reads the same table with the same order and fills `Cot::$structure[$area]` — an associative array keyed by `code`, but the **iteration order** is preserved as the order of rows in the SQL result. Accordingly, `foreach (Cot::$structure[$area] as $code => $cat)` iterates in `structure_path` order.

### 6.6. Full Data Flow During Sorting

Let's analyze the full "life cycle" of one drag:

**Step 1. The user releases the mouse over a new container**

`SortableJS.onEnd` is called. `evt.to` is the target container, `evt.item` is the moved element.

**Step 2. JS collects data**

```javascript
const toEl = evt.to;
const parentId = parseInt(toEl.dataset.parentId || '0', 10);
const order = Array.from(toEl.children)
    .filter(n => n.classList.contains('category-item'))
    .map(n => parseInt(n.dataset.id, 10));
```

**Step 3. JS forms the POST**

```javascript
const body = new URLSearchParams();
body.set('x', xToken);
body.set('ext', ext);
body.set('parent_id', parentId);
order.forEach(id => body.append('order[]', id));
```

`order[]` is sent as an array (not a `"1,2,3"` string) — this is critical for PHP.

**Step 4. AJAX handler receives**

`dragstructure.ajax.php`:

```php
$ext      = cot_import('ext', 'P', 'ALP');
$order    = cot_import('order', 'P', 'ARR');
$parentId = (int) cot_import('parent_id', 'P', 'INT');
```

**Step 5. Sanitization**

```php
$order = array_values(array_unique(array_map('intval', $order)));
$order = array_values(array_filter($order, fn($v) => $v > 0));
```

**Step 6. Validation**

`dragstructure_validate_move()`:

- check `empty($order)`;
- check all ids exist;
- check `parentId` exists;
- check "not into itself" and "not into a descendant".

**Step 7. Application (transaction)**

`dragstructure_apply_order()` — the heavy function analyzed in section 9.

**Step 8. Cache flush**

```php
if (Cot::$cache) {
    Cot::$cache->clear();
}
```

**Step 9. Log**

```php
cot_log(
    "Structure. Drag&drop reorder in '$ext' (parent: $parentId)",
    'adm',
    'structure',
    'update'
);
```

**Step 10. Commit**

```php
Cot::$db->commit();
```

**Step 11. Response**

```php
$response = [
    'success'    => true,
    'message'    => Cot::$L['dragstructure_saved'],
    'categories' => dragstructure_get_categories($ext),
];
```

**Step 12. Client redraws the tree**

```javascript
if (Array.isArray(data.categories)) {
    currentCats = data.categories;
    render(currentCats);
} else {
    location.reload();
}
```

Key advantage: the client **does not need** to reload the page — it receives a fresh `CATS_JSON` and redraws the DOM from the actual DB paths.

### 6.7. Rules and Recommendations for Sorting

**Rule 1. Do not edit `structure_path` manually.**

Any change to `structure_path` via phpMyAdmin or direct SQL breaks the `Cot::$structure` cache until the next request. The plugin does it atomically (transaction + `clear()`).

**Rule 2. Use normalization wisely.**

The "Normalize" button **resets the entire hierarchy** — all categories become root. This is a **recovery** tool, not an everyday operation. Use only if:
- paths are corrupted (duplicates, glued values);
- the structure was imported with errors;
- after a failure of a previous plugin version.

**Rule 3. Step 10 for roots is no accident.**

This is a reserve for future insertions. If you have 5 root categories, their paths will be `010`, `020`, `030`, `040`, `050` — leaving room for `015`, `025`, etc.

**Rule 4. Three levels — the practical limit.**

Cotonti physically supports any nesting, but navigation UI (breadcrumbs, URLs) becomes unintuitive after 3–4 levels. The plugin allows more, but this is rarely justified.

**Rule 5. Order affects breadcrumbs and menu.**

`cot_structure_buildpath()` reads `Cot::$structure[$area][$code]['path']` and splits it by dots, building links in order. Order in the tree = order in breadcrumbs.

**Rule 6. Changes are not reversible.**

The plugin does not keep a move history and does not support undo/redo. If a move is accidental — restore manually, knowing the desired final order.

### 6.8. Table of Correspondence "Action → SQL Result"

| UI Action | Rows Changed | Example Path Transition |
|---|---|---|
| Swapping children `[A,B]` → `[B,A]` | 2 (A, B) | `010.001` ↔ `010.002` |
| Descending into a parent | 1 + all descendants | `030` → `010.005` |
| Ascending to root | 1 + all descendants | `010.005` → `060` |
| Moving to a different parent | 1 + all descendants | `010.005` → `020.003` |
| Moving an empty category | 1 | `030` → `040` |
| Normalizing an area | all N rows | `001.005.001` → `010` |

---

## 7. Plugin Components — Detailed Breakdown

### 7.1. `dragstructure.setup.php`

**Role**: plugin metadata and default permissions.

**Content of the `[BEGIN_COT_EXT]` block:**

```
Code=dragstructure                     # Unique code
Name=Drag & Drop Structure             # Display name
Category=administration                # Category in the list
Description=…                          # Description
Version=2.0.0
Date=2026-10-22
Author=webitproff
Copyright=(c) 2026 webitproff
Notes=

Auth_guests=R                          # Base permission for guests
Lock_guests=12345A                     # Locked masks for guests
Auth_members=RW                        # Base permission for users
Lock_members=12345A                    # Locked masks
Requires_modules=                      # Module dependencies (none)
Requires_plugins=                      # Plugin dependencies (none)
Recommends_modules=
Recommends_plugins=
[END_COT_EXT]
```

**What's important to know:**

- **`Requires_modules=` empty** — the plugin formally depends on no module. But in practice it only works if there is at least one structure area in the system (otherwise `cot_die_message(404)`).
- **`Category=administration`** — the plugin appears in the "Administration" section of the extensions list.
- **Permissions `R`/`W`** on activation are written to the `*_auth` table, but actual access is still controlled in `tools.php` (see section 10).

### 7.2. `dragstructure.tools.php`

**Role**: admin page entry point. Connected via the `tools` hook.

**Execution flow:**

```
1. defined('COT_CODE') or die
2. require cot_incfile('dragstructure', 'plug')     ← API
3. require cot_langfile('dragstructure', 'plug')    ← localization
4. cot_block(cot_auth('admin','a') || cot_auth('plug','dragstructure','A'))
5. $extensionsWithStructure = cot_getExtensionsWithStructure()
6. $ext = cot_import('ext', 'G', 'ALP')
7. if empty($ext) — take the first from the list
8. if empty($extensionsWithStructure) — cot_die_message(404)
9. $t = new XTemplate(cot_tplfile('dragstructure.tools', 'plug', true))
10. Title, adminPath
11. if ($a === 'normalize') — cot_check_xg(); normalize(); message(); redirect()
12. $categories = dragstructure_get_categories($ext)
13. $t->assign([EXT, EXT_LIST, FORM_ACTION, X_TOKEN, AJAX_URL, CATS_JSON, NORMALIZE_URL])
14. if empty($categories) — parse('MAIN.NO_CATS')
15. cot_display_messages($t)
16. $t->parse('MAIN')
17. $pluginBody = $t->text('MAIN')
```

**Key points:**

#### 7.2.1. Permission check

```php
cot_block(cot_auth('admin', 'a') || cot_auth('plug', 'dragstructure', 'A'));
```

- `cot_auth('admin', 'a')` — administrator permission on the `admin` section.
- `cot_auth('plug', 'dragstructure', 'A')` — permission `A` (admin) on the plugin itself.

`cot_block(false)` (if both are `false`) causes a `cot_redirect` to the 403 page.

#### 7.2.2. Area selection

```php
$ext = cot_import('ext', 'G', 'ALP');
if (empty($ext) || !in_array($ext, $extensionsWithStructure, true)) {
    $ext = !empty($extensionsWithStructure) ? $extensionsWithStructure[0] : '';
}
if ($ext === '') {
    cot_die_message(404, true, Cot::$L['dragstructure_no_ext']);
}
```

**Logic:**

- The `ext` parameter in the URL (`?ext=page`) must be a valid extension code.
- The list of valid extensions is taken from `cot_getExtensionsWithStructure()` — extensions that declared the `structure.extensions` hook.
- If `ext` is empty — take the first from the list (usually the most active module).
- If the list is empty — `404`.

**Why the `ALP` filter?** `ALP` = "alphabetic" — allows only Latin letters/digits/`_`, which excludes injections into `$ext` at the URL parameter level.

#### 7.2.3. Normalization

```php
if ($a === 'normalize') {
    cot_check_xg();
    $updated = dragstructure_normalize($ext);
    cot_message(cot_rc('dragstructure_normalized', ['count' => $updated]));
    cot_redirect(cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext], '', true));
}
```

- `cot_check_xg()` — XSS token check (mandatory for GET actions).
- The redirect **removes** `a=normalize` from the URL so that F5 does not re-execute the action.

#### 7.2.4. Tag assignment

```php
$t->assign([
    'EXT'           => $ext,
    'EXT_LIST'      => cot_selectbox($ext, 'ext', $extensionsWithStructure, $extensionsWithStructure, false, 'onchange="this.form.submit()"'),
    'FORM_ACTION'   => cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext]),
    'X_TOKEN'       => Cot::$sys['xk'],
    'AJAX_URL'      => cot_url('plug', ['r' => 'dragstructure']),
    'CATS_JSON'     => json_encode($categories, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT),
    'NORMALIZE_URL' => cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext, 'a' => 'normalize', 'x' => Cot::$sys['xk']]),
]);
```

**Key tags:**

| Tag | Source | Purpose |
|---|---|---|
| `EXT` | Selected area | `data-ext` in the root `<div>` |
| `EXT_LIST` | `cot_selectbox()` | `<select>` for switching |
| `FORM_ACTION` | `cot_url('admin', …)` | Form action |
| `X_TOKEN` | `Cot::$sys['xk']` | CSRF token for AJAX |
| `AJAX_URL` | `cot_url('plug', ['r' => 'dragstructure'])` | AJAX endpoint |
| `CATS_JSON` | `json_encode($categories, JSON_HEX_*)` | Data for JS |
| `NORMALIZE_URL` | `cot_url(…, 'a' => 'normalize', 'x' => …)` | Normalization link |

**Why the `JSON_HEX_*` flags?** This is XSS protection: if `<script>` gets into `title`/`desc`, standard `json_encode` returns valid JSON, but when inserted into `<script>` via `let currentCats = {CATS_JSON};` problems could arise. The flags `JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT` escape `<`, `>`, `&`, `'`, `"` into Unicode sequences, making insertion safe.

### 7.3. `dragstructure.tools.tpl`

**Role**: the HTML skeleton of the admin page plus embedded JS for drag-and-drop.

**Main blocks:**

- `MAIN` — the root block (required).
- `NO_CATS` — warning about an empty area (parsed conditionally).

**DOM structure:**

```html
<div id="drag-structure"
     data-ext="{EXT}"
     data-x="{X_TOKEN}"
     data-ajax-url="{AJAX_URL}">
    <div id="category-tree" class="list-group" data-parent-id="0"></div>
    <!-- BEGIN: NO_CATS -->
    <div class="alert alert-info">{PHP.L.dragstructure_no_cats}</div>
    <!-- END: NO_CATS -->
</div>
```

- `#drag-structure` — the root, stores `data-ext`, `data-x`, `data-ajax-url`.
- `#category-tree` — the root-level container, `data-parent-id="0"`.

**Embedded JS:**

```javascript
(function () {
    const root = document.getElementById('drag-structure');
    if (!root) return;

    const ext     = root.dataset.ext;
    const xToken  = root.dataset.x;
    const ajaxUrl = root.dataset.ajaxUrl;
    const rootEl  = document.getElementById('category-tree');

    let currentCats = {CATS_JSON};

    function buildByParent(cats) { … }
    function buildNode(cat) { … }
    function render(cats) { … }
    function initSortable(el) { … }

    render(currentCats);
})();
```

**Key JS functions:**

#### `buildByParent(cats)`

Groups categories by `parentPath` and sorts each group:

```javascript
byParent[k].sort((a, b) => a.path.localeCompare(b.path, undefined, { numeric: true }));
```

`numeric: true` ensures correct comparison of numeric segments.

#### `buildNode(cat)`

Creates a DOM node:

```html
<div class="list-group-item category-item" data-id="123">
    <div class="d-flex align-items-center">
        <i class="fa-solid fa-grip-vertical me-2 text-muted category-handle"></i>
        <div class="flex-grow-1">
            <code class="me-2">010.001</code>
            <strong>news</strong> — News
        </div>
    </div>
    <div class="category-children" data-parent-id="123"></div>
</div>
```

- `.category-handle` — the only "handle" that can be dragged (rule `handle: '.category-handle'` in SortableJS).
- `.category-children` — container for children with `data-parent-id` = id of the current category.

**Important**: `title`, `desc`, `code` are inserted via string concatenation. Has the server already passed them through `htmlspecialchars` in `dragstructure_get_categories`? **No** — in the current implementation `dragstructure_get_categories()` returns "raw" values. This is a potential client-side XSS vulnerability if `<script>` gets into `title`. However:

- `CATS_JSON` is escaped with `JSON_HEX_TAG` — this protects against injection into `<script>`.
- When inserting into `innerHTML` via concatenation, `htmlspecialchars` is not applied, which in theory allows XSS via DB data.

**Maintenance recommendation**: on the next plugin revision, add field escaping in JS (`escapeHtml()`) or apply `htmlspecialchars` in `dragstructure_get_categories()` (see section 14).

#### `render(cats)`

Full tree redraw:

```javascript
function render(cats) {
    rootEl.innerHTML = '';
    const byParent = buildByParent(cats);
    function walk(parentPath, container) {
        (byParent[parentPath] || []).forEach(cat => {
            const node = buildNode(cat);
            container.appendChild(node);
            walk(cat.path, node.querySelector('.category-children'));
        });
    }
    walk('', rootEl);
    initSortable(rootEl);
}
```

**Note**: `render()` is called on every successful AJAX response — this is a simple and reliable solution (no partial updates that could "drift" from the DB).

#### `initSortable(el)`

Recursive initialization of SortableJS on the root and all `.category-children`:

```javascript
new Sortable(el, {
    group: { name: 'categories', pull: true, put: true },
    handle: '.category-handle',
    animation: 200,
    forceFallback: true,
    fallbackOnBody: true,
    swapThreshold: 0.5,
    emptyInsertThreshold: 5,
    ghostClass: 'sortable-ghost',
    chosenClass: 'sortable-chosen',
    onEnd(evt) { … }
});
el.querySelectorAll(':scope > .category-item > .category-children').forEach(initSortable);
```

**Parameters:**

- `group: { name: 'categories', pull: true, put: true }` — all containers belong to one group and can exchange elements.
- `forceFallback: true` — bypasses native HTML5 drag issues in nested containers.
- `fallbackOnBody: true` — the "ghost" is rendered in the body, avoiding clipping.
- `swapThreshold: 0.5` — switch threshold.
- `emptyInsertThreshold: 5` — allows dropping into an empty container.
- `ghostClass`, `chosenClass` — CSS classes for visual feedback.

#### `onEnd(evt)`

Drag completion handler:

```javascript
onEnd(evt) {
    const toEl = evt.to;
    const parentId = parseInt(toEl.dataset.parentId || '0', 10);
    const order = Array.from(toEl.children)
        .filter(n => n.classList.contains('category-item'))
        .map(n => parseInt(n.dataset.id, 10));

    const body = new URLSearchParams();
    body.set('x', xToken);
    body.set('ext', ext);
    body.set('parent_id', parentId);
    order.forEach(id => body.append('order[]', id));

    fetch(ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            alert(data.message || 'Error');
            location.reload();
            return;
        }
        if (Array.isArray(data.categories)) {
            currentCats = data.categories;
            render(currentCats);
        } else {
            location.reload();
        }
    })
    .catch(err => {
        console.error(err);
        alert('Network error');
        location.reload();
    });
}
```

**Important decisions:**

- `order.forEach(id => body.append('order[]', id))` — **critical** for PHP: `order[]` gives an array, `order` gives a string.
- On error — `location.reload()`: the DOM has already drifted from the DB after dragging, so manual rollback is pointless.
- On success — `render(currentCats)` with the new `data.categories` from the response.

### 7.4. `dragstructure.ajax.php`

**Role**: AJAX handler. Connected via the `ajax` hook in `plug.php?r=dragstructure`.

**Structure:**

```php
defined('COT_CODE') or die('Wrong URL.');

// Suppress any error output
ini_set('display_errors', '0');
error_reporting(0);

// Buffering
ob_start();

$response = ['success' => false, 'message' => 'Unknown error'];

try {
    require_once cot_incfile('dragstructure', 'plug');
    require_once cot_langfile('dragstructure', 'plug');

    if (!cot_auth('admin', 'a') && !cot_auth('plug', 'dragstructure', 'A')) {
        ob_end_clean();
        http_response_code(403);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Forbidden']);
        exit;
    }

    if (!cot_check_xp()) {
        ob_end_clean();
        http_response_code(400);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
        exit;
    }

    $ext      = cot_import('ext', 'P', 'ALP');
    $order    = cot_import('order', 'P', 'ARR');
    $parentId = (int) cot_import('parent_id', 'P', 'INT');

    if ($ext === '' || !is_array($order) || empty($order)) {
        ob_end_clean();
        http_response_code(400);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
        exit;
    }

    // Fallback for the string "1,2,3"
    if (!is_array($order)) {
        $order = explode(',', (string) $order);
    }
    $order = array_values(array_unique(array_map('intval', $order)));
    $order = array_values(array_filter($order, fn($v) => $v > 0));

    if (empty($order)) {
        ob_end_clean();
        http_response_code(400);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Empty order']);
        exit;
    }

    $error = dragstructure_move($ext, $order, $parentId);

    if ($error !== null) {
        $response = ['success' => false, 'message' => $error];
    } else {
        $response = [
            'success'    => true,
            'message'    => Cot::$L['dragstructure_saved'],
            'categories' => dragstructure_get_categories($ext),
        ];
    }
} catch (Throwable $e) {
    $response = ['success' => false, 'message' => $e->getMessage()];
}

ob_end_clean();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
exit;
```

**Key technical decisions:**

#### 7.4.1. `ini_set('display_errors', '0')` + `error_reporting(0)`

If a PHP warning (e.g., `Notice: Undefined index`) gets into the stream before `echo json_encode()`, the response becomes invalid JSON. Suppression is mandatory for AJAX handlers.

#### 7.4.2. `ob_start()` + `ob_end_clean()`

Even if some BOM character gets at the beginning of the response (a frequent problem with UTF-8 files), `ob_end_clean()` discards it.

#### 7.4.3. `cot_check_xp()` — CSRF

Checks the presence and validity of the POST field `x`, which must match `Cot::$sys['xk']`. The mechanism is built into Cotonti.

#### 7.4.4. Fallback for `order`

```php
if (!is_array($order)) {
    $order = explode(',', (string) $order);
}
```

In case a client (or another integration) sends `order="1,2,3"` instead of an array. The main client sends an array, but the fallback increases resilience.

#### 7.4.5. Sanitization

```php
$order = array_values(array_unique(array_map('intval', $order)));
$order = array_values(array_filter($order, fn($v) => $v > 0));
```

- `array_map('intval', …)` — cast to int (protection against `"1abc"` and `"' OR '1'='1"`);
- `array_unique()` — remove duplicates;
- `array_filter(fn($v) => $v > 0)` — discard `0` and negatives;
- `array_values()` — reindex.

#### 7.4.6. HTTP response codes

| Situation | HTTP code |
|---|---|
| No permission | 403 |
| Invalid CSRF | 400 |
| Invalid input | 400 |
| Empty order | 400 |
| Success | 200 (default) |
| Exception in try | 200 (body — `{success:false}` for JS to handle) |

Formally, code 500 is not set in `catch`, but `{success:false}` informs the client.

### 7.5. `inc/dragstructure.functions.php`

**Role**: the plugin's business logic. Five functions:

1. `dragstructure_get_categories(string $ext): array`
2. `dragstructure_index_by_id(array $categories): array`
3. `dragstructure_validate_move(array $byId, array $order, int $parentId): ?string`
4. `dragstructure_apply_order(string $ext, array $byId, array $order, int $parentId): void`
5. `dragstructure_move(string $ext, array $order, int $parentId): ?string`
6. `dragstructure_normalize(string $ext): int`

#### 7.5.1. `dragstructure_get_categories()`

Reads `*_structure` for an area, returns a flat array:

```php
[
    [
        'id'         => 1095,
        'code'       => 'site-administration',
        'title'      => 'Site Administration',
        'desc'       => 'Management and support of websites.',
        'path'       => '001',
        'parentPath' => '',
    ],
    // …
]
```

**SQL**: `SELECT structure_id, structure_code, structure_path, structure_title, structure_desc FROM *_structure WHERE structure_area = ? ORDER BY structure_path ASC, structure_code ASC`.

**Features:**

- `parentPath` is computed in PHP: `substr($path, 0, strrpos($path, '.'))` if there is a dot; otherwise `''`.
- All fields are cast to expected types (`int`, `string`).

#### 7.5.2. `dragstructure_index_by_id()`

Trivial indexing:

```php
$map = [];
foreach ($categories as $cat) {
    $map[$cat['id']] = $cat;
}
return $map;
```

Used for fast lookup by `structure_id`.

#### 7.5.3. `dragstructure_validate_move()`

Checks three types of errors:

1. **Empty `order`** → `'Empty order'`.
2. **Missing ids** → `"Category #$id not found"` or `"Parent #$parentId not found"`.
3. **Cycles**:
   - "into itself": `in_array($parentId, $order, true)` → `'Cannot move category into itself'`;
   - "into a descendant": `strpos($parentPath . '.', $childPath . '.') === 0` → `'Cannot move category into its own descendant'`.

**Important**: the check "order contains both an ancestor and a descendant" is **not performed** — it falsely triggers when moving between levels (nodes still hold old paths). Consistency is guaranteed in `dragstructure_apply_order()` by building `childrenMap`.

#### 7.5.4. `dragstructure_apply_order()` — the central function

**Full algorithm:**

1. **`$parentPath`**: `$parentId > 0 ? $byId[$parentId]['path'] : ''`.

2. **Collect `movingIds`** — all moved nodes + their descendants:

   ```php
   $movingIds = array_flip($order);
   foreach ($order as $id) {
       $descendants = Cot::$db->query(
           'SELECT structure_id FROM ' . Cot::$db->structure . '
            WHERE structure_area = ? AND structure_path LIKE ?',
           [$ext, $byId[$id]['path'] . '.%']
       )->fetchAll();
       foreach ($descendants as $d) {
           $movingIds[(int) $d['structure_id']] = true;
       }
   }
   ```

3. **`usedPaths`** — all paths except `movingIds`:

   ```php
   $usedPaths = [];
   foreach ($byId as $id => $cat) {
       if (!isset($movingIds[$id])) {
           $usedPaths[$cat['path']] = true;
       }
   }
   ```

   **Why**: if `a` (path `010`) is being moved, its old `010` should not block the selection of `010` for another category.

4. **`pathToId`** — the reverse map `path → id`.

5. **`childrenMap`** — the map `parentId → [childId]` for the moved nodes:

   ```php
   $childrenMap = [];
   foreach ($byId as $id => $cat) {
       if (!isset($movingIds[$id])) {
           continue;
       }
       $pid = 0;
       if ($cat['parentPath'] !== '' && isset($pathToId[$cat['parentPath']])) {
           $pid = $pathToId[$cat['parentPath']];
       }
       $childrenMap[$pid][] = $id;
   }
   ```

6. **Assign new paths for `order`**:

   ```php
   $changes = [];
   $isRootParent = ($parentPath === '');
   $pos = 0;
   foreach ($order as $id) {
       $oldPath = $byId[$id]['path'];
       do {
           $pos++;
           $segment = $isRootParent
               ? sprintf('%03d', $pos * 10)
               : sprintf('%03d', $pos);
           $candidate = $isRootParent ? $segment : $parentPath . '.' . $segment;
       } while (isset($usedPaths[$candidate]));

       $usedPaths[$candidate] = true;
       $changes[$id] = ['old' => $oldPath, 'new' => $candidate];
   }
   ```

   - Root: `010`, `020`, … (step 10).
   - Nested: `.001`, `.002`, … (step 1).
   - `while (isset($usedPaths[$candidate]))` — on collision with an existing category, shifts `pos`.

7. **Recursive `walkChildren`** for descendants:

   ```php
   $walkChildren = function (int $pid, string $parentPath) use (&$walkChildren, &$childrenMap, &$changes, &$byId, &$usedPaths) {
       $children = $childrenMap[$pid] ?? [];
       $pos = 0;
       foreach ($children as $childId) {
           if (isset($changes[$childId])) {
               continue;  // already handled in order
           }
           $oldPath = $byId[$childId]['path'];
           do {
               $pos++;
               $segment = sprintf('%03d', $pos);
               $candidate = $parentPath . '.' . $segment;
           } while (isset($usedPaths[$candidate]));

           $usedPaths[$candidate] = true;
           $changes[$childId] = ['old' => $oldPath, 'new' => $candidate];
           $walkChildren($childId, $candidate);
       }
   };

   foreach ($changes as $id => $info) {
       $walkChildren($id, $info['new']);
   }
   ```

8. **`dirty`** — only actually changed ones:

   ```php
   $dirty = [];
   foreach ($changes as $id => $info) {
       if ($info['old'] !== $info['new']) {
           $dirty[$id] = $info;
       }
   }
   if (empty($dirty)) {
       return;
   }
   ```

9. **Two-phase application**:

   ```php
   $tmpPrefix = '_t_' . bin2hex(random_bytes(6)) . '_';
   foreach ($dirty as $id => $info) {
       Cot::$db->update(Cot::$db->structure,
           ['structure_path' => $tmpPrefix . $id],
           'structure_id = ? AND structure_area = ?', [$id, $ext]);
   }
   foreach ($dirty as $id => $info) {
       Cot::$db->update(Cot::$db->structure,
           ['structure_path' => $info['new']],
           'structure_id = ? AND structure_area = ?', [$id, $ext]);
   }
   ```

   **Why two phases**: if `structure_path` has a UNIQUE index (the current Cotonti schema doesn't, but the plugin protects against the future), a direct swap `010.001 ↔ 010.002` would fail with duplicate key. Temporary paths eliminate the problem.

#### 7.5.5. `dragstructure_move()`

The full scenario with a transaction:

```php
function dragstructure_move(string $ext, array $order, int $parentId): ?string
{
    $categories = dragstructure_get_categories($ext);
    if (empty($categories)) {
        return 'No categories in extension';
    }

    $byId = dragstructure_index_by_id($categories);

    $error = dragstructure_validate_move($byId, $order, $parentId);
    if ($error !== null) {
        return $error;
    }

    Cot::$db->beginTransaction();
    try {
        dragstructure_apply_order($ext, $byId, $order, $parentId);

        if (Cot::$cache) {
            Cot::$cache->clear();
        }

        cot_log(
            "Structure. Drag&drop reorder in '$ext' (parent: $parentId)",
            'adm',
            'structure',
            'update'
        );

        Cot::$db->commit();
        return null;
    } catch (Throwable $e) {
        Cot::$db->rollBack();
        return $e->getMessage();
    }
}
```

**The order of operations is critical:**

1. **Validation before the transaction** — fast rejection without DB load.
2. **Transaction** — all `UPDATE`s either apply or roll back.
3. **`cache->clear()` inside try** — if the cache throws, everything rolls back.
4. **`cot_log()` inside try** — if the log fails, changes roll back.
5. **`commit()`** — only after successful logging.
6. **`rollBack()` in catch** — atomicity guarantee.

#### 7.5.6. `dragstructure_normalize()`

```php
function dragstructure_normalize(string $ext): int
{
    $rows = Cot::$db->query(
        'SELECT structure_id FROM ' . Cot::$db->structure . '
         WHERE structure_area = ?
         ORDER BY structure_id ASC',
        [$ext]
    )->fetchAll();

    $pos = 0;
    $updated = 0;
    foreach ($rows as $row) {
        $pos++;
        $newPath = sprintf('%03d', $pos * 10);
        $affected = Cot::$db->update(
            Cot::$db->structure,
            ['structure_path' => $newPath],
            'structure_id = ? AND structure_area = ? AND structure_path <> ?',
            [(int) $row['structure_id'], $ext, $newPath]
        );
        $updated += $affected;
    }

    if (Cot::$cache) {
        Cot::$cache->clear();
    }

    return $updated;
}
```

**Key points:**

- Sorting by `structure_id` — stable, independent of the current path state.
- Paths: `010`, `020`, `030`, … (step 10, width 3).
- Condition `structure_path <> ?` — does not overwrite already correct paths (optimization + correct `$affected`).
- **Not in a transaction** — unlike `dragstructure_move()`. This is intentional: normalization is idempotent; if interrupted halfway, a re-run completes it.

---

## 8. Data Model and DB Schema

### 8.1. Affected Tables

The plugin works with **only one table** — `*_structure`. It creates no own tables.

**Affected fields:**

- `structure_path` — the only field the plugin modifies in normal mode.
- `structure_id` — only for WHERE.

**Not affected:**

- `structure_code`, `structure_title`, `structure_desc`, `structure_icon`, `structure_locked`, `structure_tpl`, `structure_count`.
- `structure_area` — only for WHERE.

### 8.2. Example Before/After State

**Before:**

```
id   | code            | path        | title
1095 | site-admin      | 001         | Site Administration
1096 | site-content    | 001.001     | Site Content
1097 | system-admin    | 001.002     | System Administration
1098 | support         | 001.003     | Support Service
1099 | architecture    | 002         | Architecture
1100 | interiors       | 002.001     | Interiors
```

**After dragging `support` above `system-admin` in container `001`:**

```
id   | code            | path        | title
1095 | site-admin      | 001         | Site Administration
1096 | site-content    | 001.001     | Site Content
1098 | support         | 001.002     | Support Service           ← new path
1097 | system-admin    | 001.003     | System Administration     ← new path
1099 | architecture    | 002         | Architecture
1100 | interiors       | 002.001     | Interiors
```

`001.002` and `001.003` have swapped — this is the result of `[1096, 1098, 1097]` in `order`.

### 8.3. Correspondence "Cotonti Table ↔ Plugin"

| Cotonti Concept | DB Field | Plugin Usage |
|---|---|---|
| Identifier | `structure_id` | Primary key for UPDATE |
| Area | `structure_area` | WHERE filter, area selection |
| Code | `structure_code` | Informational in UI |
| Path | `structure_path` | **The main field of modification** |
| Template | `structure_tpl` | Not touched |
| Title | `structure_title` | Displayed in UI |
| Description | `structure_desc` | Displayed in UI |
| Icon | `structure_icon` | Not touched |
| Lock | `structure_locked` | Not touched |
| Counter | `structure_count` | Not touched |

---

## 9. Path Recalculation Algorithms

### 9.1. Algorithm Summary

| Function | Purpose | Complexity |
|---|---|---|
| `dragstructure_get_categories()` | Select + normalize | O(n) |
| `dragstructure_index_by_id()` | Indexing | O(n) |
| `dragstructure_validate_move()` | Validation | O(n·m) where m — order length |
| `dragstructure_apply_order()` | Path recalculation | O(n·d) where d — depth |
| `dragstructure_move()` | Full scenario | O(n·d + n log n) |
| `dragstructure_normalize()` | Flat numbering | O(n) |

### 9.2. Pseudocode of `dragstructure_apply_order`

```
FUNCTION apply_order(ext, byId, order, parentId):
    parentPath = (parentId > 0) ? byId[parentId].path : ""

    # Step 1. Find moved nodes + all descendants
    movingIds = set(order)
    FOR id IN order:
        descendants = SELECT structure_id FROM structure
                      WHERE area = ext AND path LIKE byId[id].path + ".%"
        FOR d IN descendants:
            movingIds.add(d.structure_id)

    # Step 2. Collect used paths
    usedPaths = { byId[id].path : id ∉ movingIds }

    # Step 3. Build pathToId
    pathToId = { cat.path : id : ∀ id ∈ byId }

    # Step 4. Build childrenMap
    childrenMap = {}
    FOR id, cat IN byId:
        IF id ∉ movingIds: CONTINUE
        pid = (cat.parentPath ≠ "" AND cat.parentPath ∈ pathToId)
              ? pathToId[cat.parentPath] : 0
        childrenMap[pid].add(id)

    # Step 5. Assign new paths for order
    changes = {}
    isRootParent = (parentPath == "")
    pos = 0
    FOR id IN order:
        oldPath = byId[id].path
        DO:
            pos++
            segment = isRootParent ? format("%03d", pos*10) : format("%03d", pos)
            candidate = isRootParent ? segment : parentPath + "." + segment
        WHILE candidate ∈ usedPaths
        usedPaths.add(candidate)
        changes[id] = {old: oldPath, new: candidate}

    # Step 6. Recursively recalculate descendants
    FUNCTION walkChildren(pid, parentPath):
        FOR childId IN childrenMap[pid]:
            IF childId ∈ changes: CONTINUE
            oldPath = byId[childId].path
            pos = 0
            DO:
                pos++
                segment = format("%03d", pos)
                candidate = parentPath + "." + segment
            WHILE candidate ∈ usedPaths
            usedPaths.add(candidate)
            changes[childId] = {old: oldPath, new: candidate}
            walkChildren(childId, candidate)

    FOR id, info IN changes:
        walkChildren(id, info.new)

    # Step 7. Filter unchanged
    dirty = { id : info ∈ changes : info.old ≠ info.new }
    IF dirty IS EMPTY: RETURN

    # Step 8. Two-phase application
    tmpPrefix = "_t_" + random_hex(6) + "_"
    FOR id, info IN dirty:
        UPDATE structure SET path = tmpPrefix + id
        WHERE id = structure_id AND area = ext
    FOR id, info IN dirty:
        UPDATE structure SET path = info.new
        WHERE id = structure_id AND area = ext
```

### 9.3. Trace Example

**Given:**

```
id=1  code=a     path=010         (root)
id=2  code=a1    path=010.001     parentPath=010
id=3  code=a2    path=010.002     parentPath=010
id=4  code=a1x   path=010.001.001 parentPath=010.001
```

**Action**: swap `[a1, a2]` → `[a2, a1]`, `parentId=1`, `order=[3, 2]`.

**Step 1.** `movingIds = {3, 2}`. Descendants of `a2` (`path=010.002`) — none. Descendants of `a1` (`path=010.001`) — `a1x` (id 4). `movingIds = {3, 2, 4}`.

**Step 2.** `usedPaths = {"010"}` (only `a`).

**Step 3.** `pathToId = {"010": 1, "010.001": 2, "010.002": 3, "010.001.001": 4}`.

**Step 4.** `childrenMap`:
- `a1` (id 2): `parentPath = "010"`, pid = 1. → `childrenMap[1] += [2]`.
- `a2` (id 3): `parentPath = "010"`, pid = 1. → `childrenMap[1] += [3]`.
- `a1x` (id 4): `parentPath = "010.001"`, pid = 2. → `childrenMap[2] += [4]`.

**Step 5.** `parentPath = "010"`, `isRootParent = false`.
- `id = 3` (`a2`): `pos=1`, segment=`"001"`, candidate=`"010.001"`. Not in `usedPaths`. `changes[3] = {"010.002" → "010.001"}`. `usedPaths = {"010", "010.001"}`.
- `id = 2` (`a1`): `pos=2`, segment=`"002"`, candidate=`"010.002"`. Not in `usedPaths`. `changes[2] = {"010.001" → "010.002"}`. `usedPaths = {"010", "010.001", "010.002"}`.

**Step 6.** `walkChildren(3, "010.001")` — no children. `walkChildren(2, "010.002")`:
- `childId = 4` (`a1x`): `pos=1`, segment=`"001"`, candidate=`"010.002.001"`. Free. `changes[4] = {"010.001.001" → "010.002.001"}`.

**Step 7.** All three changes are real, `dirty = {3, 2, 4}`.

**Step 8.** Phase 1:
- `UPDATE` id=3 → `_t_abc123_3`
- `UPDATE` id=2 → `_t_abc123_2`
- `UPDATE` id=4 → `_t_abc123_4`

Phase 2:
- `UPDATE` id=3 → `010.001`
- `UPDATE` id=2 → `010.002`
- `UPDATE` id=4 → `010.002.001`

**Result:**

```
id=1  code=a     path=010
id=2  code=a1    path=010.002
id=3  code=a2    path=010.001
id=4  code=a1x   path=010.002.001
```

The order of children of `010` in the UI: `a2` (`010.001`) → `a1` (`010.002`) → `a1x` (`010.002.001`). Everything is correct.

### 9.4. Algorithm Edge Cases

#### 9.4.1. Moving with an Empty `order` (after sanitization)

`dragstructure_validate_move` returns `'Empty order'` — before the transaction.

#### 9.4.2. Moving to a New Parent That Already Has Children

The new parent's children are not moved — they keep their `path`. `usedPaths` will contain their paths, and the algorithm will not assign conflicting ones.

#### 9.4.3. Deleted Category

`isset($byId[$id])` returns `false` → error. This protects against a stale DOM.

#### 9.4.4. `parentId` Changed in Flight

If the `parentId` category was deleted between render and the AJAX request — validation returns `"Parent #N not found"`.

---

## 10. Security: CSRF, XSS, Access Permissions

### 10.1. Access Permissions

**Three levels of verification:**

1. **Plugin level (`cot_auth('plug', 'dragstructure', 'A')`)** — the global setting "who has permission on the plugin". Managed via `admin.php?m=rights`.
2. **Administrator level (`cot_auth('admin', 'a')`)** — the standard site administrator permission.
3. **Action level (inside `tools.php`)** — `cot_block()` at the start of the file.

`ajax.php` contains a **duplicate** check:

```php
if (!cot_auth('admin', 'a') && !cot_auth('plug', 'dragstructure', 'A')) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Forbidden']);
    exit;
}
```

This is mandatory: the AJAX endpoint is directly accessible via `plug.php?r=dragstructure`, without going through `tools.php`.

### 10.2. CSRF Protection

**Cotonti mechanism:**

- The token `Cot::$sys['xk']` is a 32-character string generated on session initialization.
- **GET actions**: `cot_check_xg()` — checks `$_GET['x']`.
- **POST actions**: `cot_check_xp()` — checks `$_POST['x']`.

**In the plugin:**

- **Normalization** (GET) — `cot_check_xg()` in `tools.php`.
- **AJAX reorder** (POST) — `cot_check_xp()` in `ajax.php`.
- **The CSRF token is passed to JS** via `data-x="{X_TOKEN}"` and added to every POST.

**What it protects against:**

- An attacker cannot construct a POST request from another site (no access to `xk`).
- A link `<a href="admin.php?m=other&p=dragstructure&a=normalize">` without `&x=…` will not work.

### 10.3. XSS Protection

**Three levels:**

1. **`JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT`** in `json_encode($categories)` — escapes `<`, `>`, `&`, `'`, `"` into Unicode sequences, safe for insertion into `<script>`.

2. **`cot_import($ext, 'G', 'ALP')`** — the ALP filter allows only `[a-zA-Z0-9_]`, excluding injections into `$ext`.

3. **`array_map('intval', $order)`** — casting ids to int.

**Potential problem:**

In JS, `buildNode(cat)` inserts `cat.title`, `cat.desc`, `cat.code` into `innerHTML` via concatenation:

```javascript
'<strong>' + cat.code + '</strong> — ' + cat.title +
(cat.desc ? '<div class="small text-muted">' + cat.desc + '</div>' : '')
```

If `title` contains `<img src=x onerror=alert(1)>`, this will execute on render. **Recommendation** for future versions: escape in JS or apply `htmlspecialchars()` in `dragstructure_get_categories()`.

**Current state**: the risk is **limited** by the fact that only administrators can edit `structure_title`/`structure_desc` (via `admin.php?m=structure`), and `dragstructure` is available to the same user category. That is, XSS is possible only "to oneself" — which reduces criticality but does not eliminate it.

### 10.4. SQL Injections

All queries use **prepared statements** via `Cot::$db->query($sql, $params)` (a PDO wrapper):

```php
Cot::$db->query(
    'SELECT … WHERE structure_area = ?',
    [$ext]
);
```

`$order` contains ints (after `array_map('intval', …)`), `$parentId` — int. There is no direct concatenation in SQL.

**The only exception**: `LIKE ?` with the parameter `$byId[$id]['path'] . '.%'` — but `path` comes from the DB, not from user input.

### 10.5. Protection Against Concurrent Changes

**Scenario**: two administrators edit the structure at the same time.

**Problem**: if admin A deleted category `X`, and admin B tries to move it at that moment, `dragstructure_validate_move` returns `"Category #N not found"` — B gets an alert and `location.reload()`.

**Transaction**: `dragstructure_move` uses `beginTransaction`/`commit`, which provides DB-level isolation. On concurrent modification, one of the requests rolls back.

**Limitation**: there is no locking mechanism (row-level locking via `SELECT … FOR UPDATE`). A very fast concurrent conflict is theoretically possible, but `structure_path` rarely has a UNIQUE index, and `structure_id` is a primary key, so UPDATEs of different rows do not conflict.

---

## 11. Localization

### 11.1. Language Files

- `lang/dragstructure.ru.lang.php`
- `lang/dragstructure.en.lang.php`

**Structure**:

```php
$L['dragstructure_title']       = 'Drag & Drop structure';
$L['dragstructure_select_ext']  = 'Extension';
$L['dragstructure_no_cats']     = 'Categories not found';
$L['dragstructure_no_ext']      = 'No extensions with structure support';
$L['dragstructure_saved']       = 'Structure saved';
$L['dragstructure_error']       = 'Error saving structure';
$L['dragstructure_normalize']   = 'Normalize paths';
$L['dragstructure_normalize_confirm'] = 'All category paths will be rebuilt…';
$L['dragstructure_normalized']  = 'Categories normalized: {$count}';
```

### 11.2. Usage

- **In PHP**: `Cot::$L['dragstructure_title']`.
- **In the template**: `{PHP.L.dragstructure_title}` — XTemplate syntax.
- **In `cot_rc()`**: `cot_rc('dragstructure_normalized', ['count' => $updated])` — substitutes `{$count}`.

### 11.3. Adding a New Language

1. Copy `dragstructure.ru.lang.php` into `dragstructure.<lang>.lang.php`.
2. Translate the values (keep the keys).
3. Verify: all `{PHP.L.dragstructure_*}` in the template must be defined.

**Completeness check**: the list of used keys is in section 20.4.

---

## 12. Integration with the Cotonti Core

### 12.1. Hooks

The plugin uses **two hooks**:

| Hook | File | Entry Point |
|---|---|---|
| `tools` | `dragstructure.tools.php` | `admin.php?m=other&p=dragstructure` |
| `ajax` | `dragstructure.ajax.php` | `plug.php?r=dragstructure` |

**Why `tools`, not `admin`?**

The `admin` hook creates an item in the "Administration" menu, while `tools` creates one in "Tools". The plugin is a tool, not a standalone section. This is architecturally more correct.

**Why `ajax`, not `standalone`?**

`ajax` is connected via `plug.php?r=dragstructure` without rendering a page, which is ideal for JSON responses. `standalone` would be redundant.

### 12.2. `cot_getExtensionsWithStructure()`

```php
function cot_getExtensionsWithStructure()
{
    static $extensionsWithStructure = [];
    static $loaded = false;

    if ($loaded) return $extensionsWithStructure;

    /* === Hook === */
    foreach (cot_getextplugins('structure.extensions') as $pl) {
        include $pl;
    }
    /* ===== */

    $loaded = true;
    return $extensionsWithStructure;
}
```

This is an **extension point**: every module/plugin wishing to participate in the structure declares:

```php
$extensionsWithStructure[] = 'my_module';
```

via its own plugin on the `structure.extensions` hook. `dragstructure` picks up this list.

**Consequence**: if some extension has not declared the hook, it will **not appear** in the plugin's dropdown. This protects against attempting to edit the structure of an area that does not support it.

### 12.3. `*_structure` and `*_pages`

The plugin **does not touch** `*_pages` (or other content tables). `structure_count` is recalculated by the modules via `cot_<area>_sync()` functions, which the plugin **does not call** — that's the responsibility of `admin.php?m=structure&a=resyncall`.

**Consequence**: after dragging, `structure_count` does not change (which is logical — the number of items in a category does not depend on its position).

### 12.4. Cache

`Cot::$cache->clear()` in `dragstructure_move` and `dragstructure_normalize` fully flushes the Cotonti cache (file, APC, memcached — depending on configuration).

**Why a full flush**: `cot_load_structure()` is cached at the `$structure` level in `Cot::$structure`, plus there are `cot_cache_*` mechanisms in various modules. A targeted reset (`delete('structure')`) would not cover all dependent caches. A full `clear()` is a consistency guarantee.

**Cost**: on large sites, a full cache flush after every rearrange can be noticeable. If this becomes a problem — optimization: flush only the `structure`-related keys.

### 12.5. Logging

`cot_log()` writes to `*_logger`:

```
Structure. Drag&drop reorder in 'page' (parent: 0)
Structure. Drag&drop reorder in 'market' (parent: 22)
```

View: `admin.php?m=logger`.

**What is not logged:**

- Normalization (only via `cot_message`, in the UI).
- Failed attempts (validation rejects before the transaction).

**Audit recommendation**: add `cot_log(…)` to the `a === 'normalize'` block in `tools.php` if a full audit is required.

---

## 13. Usage Scenarios

### 13.1. Typical Scenario: Catalog Reorganization

**Given**: 200+ categories in `market`, some outdated, some in the wrong parents.

**Steps:**

1. Open `admin.php?m=other&p=dragstructure&ext=market`.
2. Make sure "market" is selected in the dropdown.
3. Drag groups of categories into the correct parents.
4. Check `data.categories` in the AJAX response — all `path` values are recalculated.
5. Visit the public side — check that breadcrumbs and menu are correct.

**Result**: 200 UPDATE queries, one `cache->clear()` call, one log entry (in fact — one per drag).

### 13.2. Scenario: Recovery After a Failure

**Given**: duplicate paths in `structure_path` (`001` occurs twice) — broken earlier.

**Steps:**

1. Click "Normalize paths".
2. Confirm in `confirm()`.
3. Get `Categories normalized: 200` (or however many were changed).
4. All categories became root (`010`, `020`, …).
5. Rebuild the hierarchy manually by dragging.

**Important**: the hierarchy is **not restored** — only a flat list. This is the documented behavior.

### 13.3. Scenario: Migration from Another CMS

**Given**: importing 500 categories from CSV/XML into `*_structure` with `path` = `0`, `0.0`, etc.

**Steps:**

1. Import — all `path` values are conditionally "flat" but with incorrect values.
2. "Normalize paths" — all will become `010`, `020`, …
3. If the hierarchy matters — first collect a map "code → parentCode" and recreate the hierarchy either via `admin.php?m=structure` or by writing a script on top of `dragstructure_move`.

### 13.4. Scenario: Testing Before Launch

**Given**: before publishing, you need to test different hierarchy variants.

**Steps:**

1. Drag categories into one variant.
2. Open the public side — evaluate UX (breadcrumbs, menu).
3. Return to the admin panel — drag into another variant.
4. Repeat until final.

**Advantage**: `cache->clear()` + `cot_load_structure()` ensure the public side sees the actual paths immediately after dragging.

### 13.5. Scenario: Audit of Changes

**Given**: several administrators with access to the plugin.

**Steps:**

1. All drags are logged via `cot_log`.
2. `admin.php?m=logger` → filter by group `adm`, type `structure`.
3. Each entry contains: `area`, `parent_id`, date, IP, user.

**Limitation**: it is not logged which exact ids were rearranged — only the fact. Detailed auditing requires extending `cot_log()`.

---

## 14. Limitations and Edge Cases

### 14.1. Technical Limitations

| Limitation | Cause | Workaround |
|---|---|---|
| Max 3 levels in practice | UI navigation | Not recommended to go deeper |
| No undo/redo | Not implemented | Restore manually |
| No move history | Not implemented | Check `cot_log` |
| Normalization loses hierarchy | Flat numbering algorithm | Use only when necessary |
| Requires JS | SortableJS + fetch | Does not work without JS |
| CDN SortableJS | Connected in the template | Replace with a local copy |
| Potential XSS via `title`/`desc` | See section 10.3 | Escape in JS |

### 14.2. Edge Cases

#### 14.2.1. Empty Area

`dragstructure_get_categories` returns `[]` → the `NO_CATS` block is parsed → a warning in the UI. The plugin works correctly.

#### 14.2.2. Area with One Category

Works. Nowhere to drag, but the UI renders.

#### 14.2.3. Area with a Very Deep Hierarchy (10+ levels)

Works, but `render()` recursively deepens, which may cause client-side performance issues. Cotonti physically supports it.

#### 14.2.4. Category with an Icon `structure_icon`

The icon is **not displayed** in the plugin UI — only `path`, `code`, `title`, `desc`. This is a UI limitation.

#### 14.2.5. Locked Category (`structure_locked=1`)

The plugin **does not block** the move. `structure_locked` means "cannot create/edit content", not "cannot move".

#### 14.2.6. The `all` Category

Cotonti has a virtual `all` category — it is **not stored** in `*_structure`, so the plugin does not see it. No conflict.

#### 14.2.7. The `system` Category

The service category (`page.system`) — the plugin sees it and can move it. **Not recommended** — `system` usually contains service pages.

#### 14.2.8. UNIQUE Index Collision

If `structure_path` has a UNIQUE index (not in the standard schema), the two-phase application solves the problem.

#### 14.2.9. Simultaneous Moves

The transaction + validation protect against most conflicts, but not against "last one wins".

### 14.3. Cotonti-Specific Limitations

- **The plugin works only with `*_structure`** — not with `*_pages`, `*_market`, `*_forums`.
- **Does not call `*_sync()`** — `structure_count` is not updated. Synchronization — via `admin.php?m=structure&a=resyncall`.
- **Does not manage permissions** — `*_auth` remains in the built-in Cotonti section.
- **Does not manage templates** — `structure_tpl` is not changed.

---

## 15. Diagnostics and Troubleshooting

### 15.1. The Plugin Does Not Appear in the List

**Symptom**: after uploading the files, `admin.php?m=extensions` does not show `dragstructure`.

**Causes:**

1. The files are uploaded to somewhere other than `plugins/dragstructure/`.
2. `dragstructure.setup.php` does not contain the `[BEGIN_COT_EXT]` block.
3. Cotonti cache — clear `datas/cache/`.

**Solution**: check the path, make sure the setup file exists, clear the cache, refresh `admin.php?m=extensions`.

### 15.2. The Page Opens but the Tree Is Empty

**Symptom**: there is a title, `#category-tree` is empty, `NO_CATS` is not shown.

**Causes:**

1. `CATS_JSON` is generated incorrectly (error in `json_encode`).
2. JS crashed on `buildByParent` due to invalid data.
3. SortableJS did not load (CDN blocked).

**Diagnosis**: open DevTools → Console → Network:

- Check that `Sortable.min.js` loaded (CDN).
- Check `let currentCats = {CATS_JSON};` in the source — is the JSON valid.
- Check that `document.getElementById('drag-structure')` is not `null`.

### 15.3. Dragging Does Not Work

**Symptom**: elements are visible but not draggable.

**Causes:**

1. SortableJS is not initialized (JS crashed before `initSortable`).
2. `.category-handle` is not the right class to drag by.
3. `handle: '.category-handle'` in the SortableJS config, but the elements lack `.category-handle`.

**Diagnosis**: check that `initSortable(rootEl)` is called in `render()`, and that the HTML contains `<i class="… category-handle"></i>`.

### 15.4. Dragging Works but the Response Is an Error

**Symptom**: `alert()` with an error, `location.reload()`.

**Possible messages:**

| Message | Cause |
|---|---|
| `Invalid CSRF token` | Session expired, `xk` mismatch |
| `Empty order` | JS sent an empty `order` |
| `Category #N not found` | Category deleted concurrently |
| `Parent #N not found` | Parent deleted concurrently |
| `Cannot move category into itself` | Dragging into its own container |
| `Cannot move category into its own descendant` | Cyclic move |
| `No categories in extension` | Area is empty |

**Diagnosis**: DevTools → Network → `plug.php?r=dragstructure` → Response.

### 15.5. After Dragging, the Public Side Shows the Old State

**Symptom**: in the admin panel the order is updated, but on the public side it's the old one.

**Causes:**

1. `Cot::$cache` is not cleared (should not happen — `cache->clear()` in `move()`).
2. A separate nginx/Varnish cache layer.
3. Browser cache — Ctrl+F5.

**Solution**: clear the server cache (Varnish/nginx fastcgi_cache), check that `Cot::$cache` is enabled and working.

### 15.6. Normalization "Hangs"

**Symptom**: the "Normalize" button is clicked, but the UI is not updated.

**Causes:**

1. Many categories (1000+) — the UPDATEs go in a batch, time > 30 sec.
2. Timeout on the nginx/php-fpm side.
3. Process killed by OOM.

**Solution**: split normalization into batches (manual refinement) or increase `max_execution_time`/`memory_limit`.

### 15.7. Errors in the PHP Log

**Symptom**: `admin.php?m=logger` contains `PHP Warning: …`.

**Common ones:**

- `Undefined index: dragstructure_saved` — `cot_langfile` is not included.
- `Trying to access array offset on value of type null` — data is not passed to the template.
- `Class Sortable not found` — a JS error, not PHP.

**Solution**: check that `require_once cot_langfile('dragstructure', 'plug')` runs before `cot_rc()`. Check that `$t->assign(…)` contains all tags from the template.

---

## 16. Extension and Customization

### 16.1. Template Customization

**Method 1: override in the admin theme**

Copy `plugins/dragstructure/tpl/dragstructure.tools.tpl` into `themes/<admin_theme>/plugins/dragstructure/dragstructure.tools.tpl` and edit it. `cot_tplfile` will find it first.

**Method 2: source edit** — not recommended (lost on update).

### 16.2. JS Customization

You can override `render()` by adding your own script to `themes/<admin>/plugins/dragstructure/extra.js` and including it in the template. But `render` is a local IIFE function, closed to outside access.

**Alternative**: override `initSortable` entirely through inheritance, or add custom fields to `buildNode` (for example, the `structure_icon` icon).

### 16.3. Adding Your Own Structure Area

`dragstructure` **automatically** picks up areas from `cot_getExtensionsWithStructure()`. To add your own, a module/plugin must:

1. Declare the `structure.extensions` hook in `[BEGIN_COT_EXT]`.
2. In the plugin file for that hook, add `$extensionsWithStructure[] = 'my_ext';`.
3. Make sure `structure_area='my_ext'` is used in the `*_structure` table.

**Example of the plugin file `myext.structure.extensions.php`:**

```php
<?php
defined('COT_CODE') or die('Wrong URL.');
$extensionsWithStructure[] = 'myext';
```

### 16.4. Adding a "Create Category" Feature

Currently, the plugin **does not create** categories. If needed — extend `tools.php`:

1. Add a creation form (following `admin.php?m=structure&a=add`).
2. Handle the POST via `cot_structure_add()`.
3. Add a button to `tools.tpl`.

But it's simpler to use the built-in Cotonti section.

### 16.5. Adding Auditing

For a full audit, log not only the fact but the details:

```php
cot_log(
    "Structure. Drag&drop reorder in '$ext' (parent: $parentId). "
    . "Order: " . implode(',', $order),
    'adm',
    'structure',
    'update',
    ['extra_field' => json_encode($order)]
);
```

Requires configuring `*_logger` extrafields or simply extending the string.

---

## 17. Performance

### 17.1. Complexity Estimate

| Operation | Complexity | Comment |
|---|---|---|
| `get_categories` | O(n) | One SELECT |
| `validate_move` | O(n·m) | Loops over `order` |
| `apply_order` (steps 1–5) | O(n + m) | Set collection |
| `apply_order` (step 6) | O(k) | k = descendants of moved nodes |
| `apply_order` (step 8) | O(k) UPDATE | k — changed |
| `move` (total) | O(n + m + k·log k) | + transaction |
| `normalize` | O(n) UPDATE | n — all categories of the area |

**n** — total categories in the area, **m** — size of `order`, **k** — moved subtree.

### 17.2. Real Numbers

For the `page` area (~50 categories) and a typical move of 1 category:

- `get_categories`: ~1 ms
- `validate_move`: <1 ms
- `apply_order`: ~5–10 UPDATE, ~5–15 ms
- `cache->clear()`: 10–100 ms (depends on the driver)
- `cot_log`: ~1 ms
- **Total**: ~20–120 ms

For the `market` area (~1000 categories):

- `get_categories`: ~20–50 ms
- `apply_order`: 5–20 UPDATE (depends on depth)
- `cache->clear()`: 100–500 ms
- **Total**: ~200–700 ms

### 17.3. Bottlenecks

1. **`cache->clear()`** — the most expensive operation. On large sites — seconds.
2. **`get_categories` on large areas** — returns all categories (for `CATS_JSON` and validation).
3. **Recursive `walkChildren`** — deep subtrees (>100 descendants) give O(k) with large k.
4. **Two-phase application** — double the number of UPDATEs.

### 17.4. Optimization (If It Becomes a Problem)

1. **Do not flush the entire cache**: replace `Cache::clear()` with a targeted `Cache::delete('structure')`. Requires analysis of which keys depend on the structure.
2. **Paginate `get_categories`**: if the area is >500 categories, return only the upper levels, the rest — lazy load. Not implemented.
3. **Batch UPDATE** via `CASE WHEN` or `INSERT … ON DUPLICATE KEY UPDATE` (MySQL) instead of one-by-one `UPDATE`. Speeds up 3–5 times.
4. **Deferred `cache->clear()`** — via a queue. Harder to implement.

### 17.5. What Is Already Optimized

- **Two-phase application is not performed** if `dirty` is empty (fast exit).
- **`structure_path <> ?` in `normalize`** — does not overwrite already normalized paths.
- **`fetchAll` + `array_flip`** in `apply_order` — fast in-memory lookup.
- **`childrenMap`** — O(1) access to children.

---

## 18. Comparison with Built-in Cotonti Tools

### 18.1. Comparison Table

| Feature | `admin.php?m=structure` | `dragstructure` |
|---|---|---|
| Creating categories | ✅ | ❌ |
| Deleting categories | ✅ | ❌ |
| Editing title/desc/icon | ✅ | ❌ |
| Changing `structure_path` manually | ✅ (text field) | ❌ (automatic) |
| Visual drag-and-drop | ❌ | ✅ |
| Automatic path recalculation | ❌ | ✅ |
| Tree rendering | Flat list with indents | Full tree |
| Normalization | ❌ | ✅ |
| Resync count | ✅ | ❌ |
| Template management | ✅ | ❌ |
| Permission management | Separate section | ❌ |

### 18.2. When to Use Which

**Use `admin.php?m=structure`:**

- when creating/deleting categories;
- when editing metadata (title/desc/icon);
- for `resync count`;
- for template management.

**Use `dragstructure`:**

- for mass reorganization of the hierarchy;
- when visual control of the order is needed;
- for recovery after a failure.

### 18.3. Working Together

The plugin and the built-in section **do not conflict**:

- both read/write `*_structure`;
- both use the cache (flush after changes);
- both follow the `structure_path` rules.

**Recommended workflow**:

1. Create categories via `admin.php?m=structure`.
2. Fill in metadata (title/desc/icon/tpl).
3. Organize the hierarchy via `dragstructure`.
4. As needed — `resync count`.

---

## 19. Glossary

| Term | Definition |
|---|---|
| **AJAX** | Asynchronous JavaScript and XML — a technology for asynchronous data exchange between client and server. In the plugin, it is used to send `order` without reloading the page. |
| **API** | Application Programming Interface. In the plugin context — the set of `dragstructure_*` functions available to other developers. |
| **`cache->clear()`** | The Cotonti cache clearing method (`Cache` class). Flushes all cached extension data. |
| **CATS_JSON** | An XTemplate tag containing a JSON array of all categories of the area. Passed to JS as `currentCats`. |
| **CDN** | Content Delivery Network. SortableJS is loaded from the jsdelivr CDN in the template. |
| **CMF** | Content Management Framework. Cotonti is a CMF. |
| **CoTemplate** | The Cotonti template engine (a fork of XTemplate). Handles `{TAG}`, `<!-- BEGIN: BLOCK -->`, etc. |
| **Cotonti** | The PHP framework (CMF) for which the plugin is written. |
| **cot_auth()** | A Cotonti core function for checking access permissions. Returns a bool or an array. |
| **cot_check_xg()** | A core function that checks the GET token `x` for CSRF protection. |
| **cot_check_xp()** | A core function that checks the POST token `x` for CSRF protection. |
| **cot_import()** | A core function for safely importing data from GET/POST. Applies a filter (INT, ALP, TXT, etc.). |
| **cot_langfile()** | A core function that includes the extension's language file. |
| **cot_log()** | A core function that writes to the system log (`*_logger`). |
| **cot_message()** | A core function for adding a message to the queue. |
| **cot_rc()** | A core function for rendering resource strings with parameter substitution. |
| **cot_selectbox()** | A core function that generates an HTML `<select>`. |
| **cot_tplfile()** | A core function that finds the template path, taking the theme and admin mode into account. |
| **cot_url()** | A core function that generates a URL according to Cotonti rules. |
| **CSRF** | Cross-Site Request Forgery — an attack exploiting someone else's session. Protection via the `x` token. |
| **DOM** | Document Object Model. The client DOM is updated after drag-and-drop. |
| **Drag & Drop** | Dragging — a UX pattern implemented via SortableJS. |
| **endpoint** | An API endpoint. In the plugin — `plug.php?r=dragstructure`. |
| **`ext`** | The structure area code (`structure_area`). For example, `page`, `market`. |
| **`extensionsWithStructure`** | An array of structure areas that declared the `structure.extensions` hook. |
| **`fetch()`** | A JavaScript function for HTTP requests. Used instead of XMLHttpRequest. |
| **JSON** | JavaScript Object Notation — a data format. Used for `CATS_JSON` and AJAX responses. |
| **JSON_HEX_TAG, JSON_HEX_AMP, …** | `json_encode()` flags escaping `<`, `>`, `&`, `'`, `"` — XSS protection. |
| **`location.reload()`** | A JavaScript function that reloads the page. Called on AJAX errors. |
| **`onEnd`** | A SortableJS event fired when dragging finishes. |
| **PDO** | PHP Data Objects — an extension for working with databases. Used in CotDB. |
| **`parentPath`** | The part of `structure_path` up to the last dot. Empty for root categories. |
| **prepared statement** | A prepared SQL query that protects against injections. |
| **`structure_area`** | The extension code (area). A field in `*_structure`. |
| **`structure_code`** | The symbolic code of a category. A field in `*_structure`. |
| **`structure_count`** | The counter of items in a category. A field in `*_structure`. |
| **`structure_id`** | The unique category identifier. Primary key. |
| **`structure_path`** | The numeric path of a category with dots. **The plugin's main field.** |
| **`structure_title`** | The display title of a category. A field in `*_structure`. |
| **SortableJS** | A JS library for drag-and-drop. Connected via CDN. |
| **sticky bit (the plugin doesn't have one)** | — |
| **`tools` hook** | The admin panel connection point for tool plugins. |
| **XTemplate** | An alternative name for CoTemplate (by class). |
| **`xk`** | The Cotonti CSRF token (`Cot::$sys['xk']`). |
| **XSS** | Cross-Site Scripting — an attack via script injection. Protection via `htmlspecialchars` and `JSON_HEX_*`. |
| **"Glued paths"** | A state in which `structure_path` contains duplicates or inconsistent values (e.g., `001` twice). |
| **"Normalization"** | Reducing all paths of an area to a flat list `010`, `020`, … |

---

## 20. Appendices

### 20.1. Full List of Plugin Files

```
plugins/dragstructure/
├── dragstructure.setup.php
├── dragstructure.tools.php
├── dragstructure.ajax.php
├── inc/
│   └── dragstructure.functions.php
├── tpl/
│   └── dragstructure.tools.tpl
└── lang/
    ├── dragstructure.ru.lang.php
    └── dragstructure.en.lang.php
```

### 20.2. Full List of API Functions

```php
dragstructure_get_categories(string $ext): array
dragstructure_index_by_id(array $categories): array
dragstructure_validate_move(array $byId, array $order, int $parentId): ?string
dragstructure_apply_order(string $ext, array $byId, array $order, int $parentId): void
dragstructure_move(string $ext, array $order, int $parentId): ?string
dragstructure_normalize(string $ext): int
```

### 20.3. Full List of XTemplate Tags

| Tag | Source |
|---|---|
| `{EXT}` | `cot_import('ext', 'G', 'ALP')` |
| `{EXT_LIST}` | `cot_selectbox(...)` |
| `{FORM_ACTION}` | `cot_url('admin', [...])` |
| `{X_TOKEN}` | `Cot::$sys['xk']` |
| `{AJAX_URL}` | `cot_url('plug', ['r' => 'dragstructure'])` |
| `{CATS_JSON}` | `json_encode($categories, JSON_HEX_*)` |
| `{NORMALIZE_URL}` | `cot_url('admin', [... 'a' => 'normalize', 'x' => …])` |
| `{PHP.L.dragstructure_title}` | `Cot::$L['dragstructure_title']` |
| `{PHP.L.dragstructure_select_ext}` | `Cot::$L['dragstructure_select_ext']` |
| `{PHP.L.dragstructure_normalize}` | `Cot::$L['dragstructure_normalize']` |
| `{PHP.L.dragstructure_normalize_confirm}` | `Cot::$L['dragstructure_normalize_confirm']` |
| `{PHP.L.dragstructure_no_cats}` | `Cot::$L['dragstructure_no_cats']` |

### 20.4. Full List of Language Keys

```
dragstructure_title
dragstructure_select_ext
dragstructure_no_cats
dragstructure_no_ext
dragstructure_saved
dragstructure_error
dragstructure_normalize
dragstructure_normalize_confirm
dragstructure_normalized
```

### 20.5. Full List of Hooks

| Hook | File | Entry Point |
|---|---|---|
| `tools` | `dragstructure.tools.php` | `admin.php?m=other&p=dragstructure` |
| `ajax` | `dragstructure.ajax.php` | `plug.php?r=dragstructure` |

### 20.6. Full List of SQL Queries

**`dragstructure_get_categories`:**

```sql
SELECT structure_id, structure_code, structure_path, structure_title, structure_desc
FROM *_structure
WHERE structure_area = ?
ORDER BY structure_path ASC, structure_code ASC
```

**`dragstructure_apply_order` (descendant selection):**

```sql
SELECT structure_id FROM *_structure
WHERE structure_area = ? AND structure_path LIKE ?
```

**`dragstructure_apply_order` (phase 1):**

```sql
UPDATE *_structure
SET structure_path = ?
WHERE structure_id = ? AND structure_area = ?
```

**`dragstructure_apply_order` (phase 2):**

```sql
UPDATE *_structure
SET structure_path = ?
WHERE structure_id = ? AND structure_area = ?
```

**`dragstructure_normalize` (selection):**

```sql
SELECT structure_id FROM *_structure
WHERE structure_area = ?
ORDER BY structure_id ASC
```

**`dragstructure_normalize` (update):**

```sql
UPDATE *_structure
SET structure_path = ?
WHERE structure_id = ? AND structure_area = ? AND structure_path <> ?
```

### 20.7. AJAX Request Sequence Diagram

```
Client                Server                          DB
  │                     │                              │
  │  POST plug.php?r=…  │                              │
  │────────────────────>│                              │
  │                     │   cot_check_xp()             │
  │                     │   cot_import()               │
  │                     │   dragstructure_move()       │
  │                     │      ├── get_categories ─────>│
  │                     │      │<── categories ────────│
  │                     │      ├── index_by_id         │
  │                     │      ├── validate_move       │
  │                     │      ├── beginTransaction    │
  │                     │      ├── apply_order         │
  │                     │      │   ├── UPDATE tmp ─────>│
  │                     │      │   ├── UPDATE final ───>│
  │                     │      ├── cache->clear()      │
  │                     │      ├── cot_log ────────────>│
  │                     │      ├── commit              │
  │                     │      └── get_categories ─────>│
  │                     │<── categories ──────────────│
  │  JSON response      │                              │
  │<────────────────────│                              │
  │                     │                              │
  │  render(cats)       │                              │
  │                     │                              │
```

### 20.8. Deployment Checklist

- [ ] Plugin files are uploaded to `plugins/dragstructure/`.
- [ ] The plugin is activated in `admin.php?m=extensions`.
- [ ] Plugin permissions are assigned to the "Administrators" group.
- [ ] The page `admin.php?m=other&p=dragstructure` has been opened.
- [ ] Verified that the `<select>` contains all the needed areas.
- [ ] Verified that the tree renders correctly.
- [ ] Test drag has been performed.
- [ ] Verified that `cache->clear()` works (the public side updates).
- [ ] Logging has been verified (`admin.php?m=logger`).
- [ ] Recovery after "Normalization" has been verified.

### 20.9. Known Issues and Limitations (Summary)

| # | Issue | Severity | Status |
|---|---|---|---|
| 1 | Potential XSS via `title`/`desc` | Medium | Requires a fix in the next version |
| 2 | No undo/redo | Low | By design |
| 3 | No audit of specific ids | Low | By design |
| 4 | CDN SortableJS (external dependency) | Low | Replaceable with a local copy |
| 5 | Full `cache->clear()` | Low | By design |
| 6 | No `structure_count` update | Low | By design (module responsibility) |
| 7 | Only `structure_path` is editable | Low | By design |

### 20.10. Links

- **Plugin source code on GitHub**: https://github.com/webitproff/dragstructure-cotonti/
- **Cotonti on GitHub**: https://github.com/Cotonti/Cotonti
- **SortableJS**: https://github.com/SortableJS/Sortable
- **Bootstrap 5**: https://getbootstrap.com/docs/5.3/
- **Font Awesome**: https://fontawesome.com/

---

**End of document.**

> The document has been prepared based on the analysis of the source code of the `dragstructure` plugin v2.0.0 and its integration with Cotonti CMF. All examples and descriptions correspond to the current implementation. In case of discrepancy between the behavior and what is described — the source code takes priority.
> 
