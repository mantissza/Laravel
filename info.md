<!-- omit in toc -->
# Szerveroldali webprogramozás 2023/24/1 - Laravel beadandó
<!-- omit in toc -->

- [Követelmények](#követelmények)
  - [Minimumkövetelmények](#minimumkövetelmények)
  - [Általános elvárások](#általános-elvárások)
  - [Értékelési szempontok](#értékelési-szempontok)
- [Feladat (50 pont)](#feladat-50-pont)
  - [Adatbázis (3 pont)](#adatbázis-3-pont)
  - [Seeder (3 pont)](#seeder-3-pont)
  - [Főoldal (2 pont)](#főoldal-2-pont)
  - [Keresés (3 pont)](#keresés-3-pont)
  - [Káresemény részletező oldal (3 pont)](#káresemény-részletező-oldal-3-pont)
  - [Keresési előzmények (6 pont)](#keresési-előzmények-6-pont)
  - [Jármű hozzáadása (6 pont)](#jármű-hozzáadása-6-pont)
  - [Jármű szerkesztése (4 pont)](#jármű-szerkesztése-4-pont)
  - [Káresemény hozzáadása (6 pont)](#káresemény-hozzáadása-6-pont)
  - [Káresemény szerkesztése (4 pont)](#káresemény-szerkesztése-4-pont)
  - [Káresemény törlése (2 pont)](#káresemény-törlése-2-pont)
  - [Prémium felhasználók kezelése (4 pont)](#prémium-felhasználók-kezelése-4-pont)
  - [Védésre szerezhető pontszám (4 pont)](#védésre-szerezhető-pontszám-4-pont)

## Követelmények

**Figyelmesen olvass el minden követelményt, általános elvárást és értékelési szempontot, mielőtt megkezded a munkát!**

Ha a feladattal vagy a követelményekkel kapcsolatban bármilyen kérdésed van, akkor nyugodtan kérj segítséget a gyakorlatvezetődtől, de írhatsz a _Teams_ csoport _Általános_ csatornájára is.

### Minimumkövetelmények

Amennyiben a beadandó feladat nem felel meg **BÁRMELYIK** minimumkövetelménynek, úgy nem áll módunkban elfogadni, és nem teljesítheted a tárgyat a félévben!

<details>

<summary>Minimumkövetelmények megtekintése</summary>

- Határidő betartása: **2023. november 28. 23:59!**
  - Késés alapvetően **NEM** megengedett; kivéve egyéni megegyezésre a gyakorlatvezető felé **időben jelzett, igazolható, méltányossági** alapon (pl. haláleset, tartós betegség). _(A határidő köteledtével érkező "el kellett utaznom", "zh-t írtam tegnap" és "nem működik a(z) gépem/internet" szintű megkereséseket **mérlegelés nélkül** el fogjuk utasítani, hiszen circa **1,5 hónap** állt rendelkezésre ezek áthidalására.)_
- Az alkalmazást **Laravel 10** keretrendszerben, **SQLite** adatbázis használatával kell megvalósítani!
  - Ha az ORM-et szabályosan használod, akkor egyébként nem számít, hogy milyen adatbázis fut a háttérben a fejlesztés során, de mi a teszteléshez és értékeléshez *SQLite* adatbázist fogunk használni.
- Az elkészült munkát a tárgy **Canvas-felületre** kell feltölteni az alábbiak szerint:
  - egyetlen `.zip` archívumot kell beadni
  - az archívum **NEM tartalmazhatja** a csomagkezelők által karbantartott `vendor` és `node_modules` mappákat, SEM a `.git`, `.idea`, `.vscode` mappákat
  - beadott `.zip`-ből az alkalmazás a következő inicializációs fájlokkal (és nem többel) **beüzemelhető** legyen:
    - [init.bat](https://gist.githubusercontent.com/totadavid95/10c2b013a5c8a0a98d16cb21c45d217a/raw/b94112422523b68a159a0b96912f86fe46868ac3/init.bat) (Windows-on)
    - [init.sh](https://gist.githubusercontent.com/totadavid95/10c2b013a5c8a0a98d16cb21c45d217a/raw/b94112422523b68a159a0b96912f86fe46868ac3/init.sh) (Linux-on / Mac-en)
  - A hallgató saját **felelőssége**, hogy a feltöltést időben megkezdje; valamint meggyőződjön róla, hogy a végleges kidolgozást tartalmazó helyes állományt adja be a fenti követelményeknek megfelelően! **Ezzel kapcsolatban utólag semmilyen kifogást nem fogadunk el, nincs lehetőség a határidő után a beadást javítani vagy pótolni!**
- Minden megvalósított funkció **értelmes módon** elérhető kell legyen a frontendről is!
- Az alkalmazás nem dobhat **kritikus hibát** a beüzemelés és alapvető használat során! Ha a beadás nem inicializálható a fenti scriptekkel vagy az átlag felhasználó kritikus hibát tud okozni, akkor a beadandó feladat nem értékelhető!
- A `.zip` gyökérmappájába a `<NÉV>` és `<NEPTUN>` mezők kitöltése után mellékelni kell az alábbi nyilatkozatot `STATEMENT.md` néven:
  ```text
  # Nyilatkozat

  Hallgató neve: <NÉV>
  Hallgató Neptun kódja: <NEPTUN>

  Ezt a megoldást a fent nevezett hallgató küldte be és készítette a Szerveroldali webprogramozás tárgy Laravel beadandó számonkérésére.

  Kijelentem, hogy ez a megoldás a saját munkám. Nem másoltam vagy használtam harmadik féltől származó megoldásokat. Nem továbbítottam megoldást hallgatótársaimnak, és nem is tettem közzé. Nem használtam mesterséges intelligencia által generált kódot, kódrészletet. Az ELTE HKR 377/A. § értelmében, ha nem megengedett segédeszközt veszek igénybe, vagy más hallgatónak nem megengedett segítséget nyújtok, a tantárgyat nem teljesíthetem.

  ELTE Hallgatói Követelményrendszer, IK kari különös rész, 377/A. §: "Az a hallgató, aki olyan tanulmányi teljesítménymérés (vizsga, zárthelyi, beadandó feladat) során, amelynek keretében számítógépes program vagy programmodul elkészítése a feladat, az oktató által meghatározottakon kívül más segédeszközt vesz igénybe, illetve más hallgatónak meg nem engedett segítséget nyújt, tanulmányi szabálytalanságot követ el, ezért az adott félévben a tantárgyat nem teljesítheti és a tantárgy kreditjét nem szerezheti meg."
  ```

</details>

### Általános elvárások

<details>

<summary>Általános elvárások megtekintése</summary>

Az egyes részfeladatok korrekt megvalósításához a következők is hozzátartoznak akkor is, ha az adott feladatnál nem részleteztük:

- Minden esetben a Laravel által biztosított **validációs** lehetőségeket **kötelező** alkalmazni! A kliensoldali  validációért **pontlevonás** jár, hiszen nem erre vagyunk kíváncsiak ezen a tárgyon!
- Az űrlapoknak **állapottartóknak** kell lenniük, azaz ha hiba történik, akkor a felhasználó által megadott adatokat vissza kell tölteni az űrlapba, illetve a **pontos hibaüzeneteket** kell jeleníteni.
- Szerkesztés esetén az űrlapot ki kell tölteni a **meglévő** adatokkal.
- Ha valamilyen **hiba történik**, akkor azt minden esetben érthetően kell jelezni a felhasználó számára. Ha a kódod "elszáll" vagy lefagy, az **pontlevonást** jelenthet - súlyos esetben a beadandó feladat pontozás nélkül elutasítható!
- A **jogosultságkezelésnél** nem elegendő csak a frontendhez kötődő végpontokat levédeni, hanem a műveletet végző végpontnál is kell ellenőrzés.
- A frontendhez használt technológia szabadon választható, de nem érdemes túlbonyolítani, mivel pontot nem ér.
Ajánlott az órán tanultakat alkalmazni, de nem kötelező. A frontendnek nem kell szépnek lennie, csak használhatónak.

</details>

### Értékelési szempontok

<details>

<summary>Értékelési szempontok megtekintése</summary>

- Összesen **50 pont** érhető el, amelyből **legalább 40%-ot**, tehát 20 pontot el kell érni a beadandó feladat sikeres teljesítéséhez. Lehet részpontokat is szerezni az egyes feladatok részleges megoldására.
- **Nem értékelünk** olyan beadásokat, amik nem felelnek meg hiánytalanul **MINDEN minimumkövetelménynek!**
- A kikommentelt vagy használatlan kódrészletekre **nem jár pont** akkor sem, ha egyébként helyes lenne.
- Az adatbázis kivételével az alkalmazást elsősorban (de nem kizárólag) **funkcionálisan** értékeljük, ezért minden funkció elérhető kell legyen a frontendről is **értelmes** helyről!
- A beadandók többlépcsős, automatizált **plágiumellenőrzésen** esnek át, ezért kérünk mindenkit, hogy a saját munkáját
adja le, mivel a másolásokat észre fogjuk venni! Egyezés esetén **MINDEN** érintett hallgató automatikusan elégtelent kap! **Emiatt különösen érdemes arra ügyelni, hogy időközben ne szivárogjon ki a munka publikus tárhelyre vagy repozitóriumba, mert ilyen esetben nem fogunk nyomozásokat folytatni, hogy ki a forrás!**

</details>

## Feladat (50 pont)

A beadandó feladat során egy alapvető gépjármű-kártörténet kezelő rendszert kell elkészítened Laravel keretrendszer használatával.

Szeretnénk, ha a feladatot alapvetően kellő **alkotói szabadsággal** fognátok meg, nem pedig kőbe vésett dologként. Lényegében minden (tiszta módon keletkezett) megoldás elfogadható, amíg az alább részletezett követelményeket teljesíti; tehát abban, ami nincs a továbbiakban specifikálva, **teljesen szabadon** mozoghattok. Érdemes jól tanulmányozni az elvárásokat, ugyanis **csak az ér pontot, amit expliciten leírtunk** a pontozásban; a kurzus teljesítése szempontjából tehát felesleges egy túlgondolt/bonyolultabb feladatot megoldani, persze mindig örülünk, ha extra szorgalmasak vagytok. :)

A feladathoz **kötelező kiinduló csomag nincs**, javasolt azonban a **Laravel Breeze** használata, amely a frontend beüzemelésen felül a hitelesítés alapját is biztosítja.

### Adatbázis (3 pont)

Készítsd el a megfelelő adatbázis táblákat és modelleket az alábbiak szerint:

**Modellek:**
- Felhasználó
  - ez a Laravel alapértelmezett táblája, két mezőt kell hozzáadni:
    - adminisztrátor-e (logikai)
    - prémium felhasználó-e (logikai) - az adminisztrátorok automatikusan prémium felhasználók is, ezt többféleképpen
    is meg lehet oldani
- Jármű
  - rendszám
  - márka
  - típus
  - gyártási év
  - kép
- Káresemény
  - helyszín
  - időpont
  - leírás
- Keresési előzmény
  - keresett rendszám
  - keresés ideje

**Kapcsolatok:**

- Felhasználó `1 : N` Keresési előzmények
  - (ki volt az a felhasználó, aki a keresést végezte)
- Jármű `N : N` Káresemény
  - (egy káreseményben több gépjármű is részt vehet, és egy járművet is érinthet több káresemény)

### Seeder (3 pont)

Készíts egy seedert, ami feltölti az adatbázist!

Ügyelj arra, hogy a seeder:
- minden eshetőségre fel legyen készítve, tehát kezelje a kapcsolatokat, illetve
- konzisztens adatokat generáljon, tehát pl. mindig készítsen prémium és nem prémium felhasználókat is, a káresemények
dátumai nem lehetnek a jövőben, stb.

Fontos továbbá, hogy:
- ne beégetett adatokat használj, hanem generáld őket pl. _faker_ használatával
- **nem kell rengeteg adatot generálni** - csak néhányat, amennyi elég a teszteléshez

### Főoldal (2 pont)

- Jeleníts meg egy rövid ismertető szöveget a rendszerről!
- Jelenjen meg egy keresőmező, amivel egy rendszámot beírva a rendszer megkeresi a járműhöz tartozó káreseményeket és
megjeleníti azokat egy táblázatban! (A keresőmezőt a vendég is láthatja, de amikor elküldi az űrlapot, akkor a rendszer irányítsa át a bejelentkezési oldalra, lásd következő feladat.)

### Keresés (3 pont)

- A keresést csak bejelentkezett felhasználók tudják elvégezni. Ha a felhasználó nincs bejelentkezve, akkor a rendszer
irányítsa át a felhasználót a bejelentkezési oldalra és a bejelentkezés után vissza a kereséshez.
- Egyszerre csak egy járműre lehet rákeresni, és a teljes rendszámot meg kell adni.
- A rendszám formátumát ellenőrizni kell: az egyszerűség kedvéért ez mindig három nem ékezetes betű és három szám. A kis- és nagybetűk nem számítanak, a kötőjel közöttük opcionális, de ha jelen van, akkor a betűk és számok között kell lennie.
Tehát formatilg helyes rendszám lehet az `ABC123`, `abc123`, `abc-123`, `ABC-123`, `abc-123`, `aBc123`, de nem lehet pl. `abc123-` vagy `abc--123`!
- Ha a keresett rendszám nincs nyilvántartva, akkor a rendszer jelezze ezt.
- Egyéb esetben a rendszer jelenítse meg a jármű alapadatait, a képét, valamint a hozzá tartozó káreseményeket időrendi
sorrendben (legutolsó esemény legfelül)!
- A káreseményre kattintva a felhasználók eljuthatnak a káresemény részletező oldalára.

### Káresemény részletező oldal (3 pont)

- Ezt az oldalt csak prémium felhasználók érhetik el. Ha a felhasználó nem prémium, akkor a rendszer jelezze ezt!
- A káresemény részletező oldalon jelenjenek meg a káresemény adatai: a hozzá tartozó járművek adatai és képei.

### Keresési előzmények (6 pont)

- Legyen egy oldal, ahol a felhasználók megtekinthetik a saját keresési előzményeiket, ehhez értelemszerűen ki kell bővíteni magát a keresési funkciót is.
- A főoldalon a keresőmező alatt jelenjen meg egy gomb, amivel a felhasználók megtekinthetik a keresési előzményeiket.
- A keresési előzményhez jelenjen meg a jármű miniatűr képe, a keresett rendszám és a keresés ideje.
- Lapozással oldd meg, hogy egyidejűleg 10 keresési előzmény látszódjon!
- Egy keresési előzményre kattintva a felhasználók ismét elvégezhetik a keresést.

### Jármű hozzáadása (6 pont)

- Ezt az oldalt/végpontot csak az adminisztrátorok érhessék el!
- Legyen lehetőség új jármű hozzáadására annak adatainak beírásával és képének feltöltésével!
- A rendszám formátumát ellenőrizni kell a _Keresés_ feladatrésznél leírtak szerint!
- A rendszámot mindig `AAA-111` formátumban kell eltárolni az adatbázisban függetlenül attól, hogy a felhasználó hogyan adta meg.
- A járműről készült képet ténylegesen töltsd fel a szerverre, ne csak egy linket tárolj el!
- A létrehozáskor kötelező a kép feltöltése, illetve minden adat kitöltése!

### Jármű szerkesztése (4 pont)

- Ezt az oldalt/végpontot csak az adminisztrátorok érhessék el!
- Szerkesztés esetén a rendszám már nem módosítható, de a többi adat igen!
- A szerkesztés során a kép nem kötelező. Ha nem töltik fel, akkor a régi kép maradjon meg!
- Ha a képet módosítják, akkor a régi képet a tárhelyről is törölni kell!

### Káresemény hozzáadása (6 pont)

- Ezt az oldalt/végpontot csak az adminisztrátorok érhessék el!
- Legyen lehetőség új káresemény hozzáadására! A leírás opcionális, minden egyéb mező kitöltése kötelező! A káresemény időpontja csak múltbeli lehet.
- A káreseményhez legyen lehetőség hozzáadni járműveket (pl. checkbox listával) úgy, hogy egy jármű csak egyszer szerepelhet egy káreseményben!

### Káresemény szerkesztése (4 pont)

- Ezt az oldalt/végpontot csak az adminisztrátorok érhessék el!
- Legyen lehetőség a meglévő káreseményeket szerkeszteni is!
- A káreseményhez legyen lehetőség hozzáadni / eltávolítani járműveket (pl. checkbox listával) úgy, hogy egy jármű csak egyszer szerepelhet egy káreseményben!

### Káresemény törlése (2 pont)

- Az adminisztrátorok törölhessenek is káreseményeket!

### Prémium felhasználók kezelése (4 pont)

- Ezt az oldalt/végpontot csak az adminisztrátorok érhessék el!
- Az adminisztrátorok tudják prémium felhasználóvá tudják tenni a felhasználókat, illetve vissza tudják vonni a prémium
státuszt.
- Ehhez készíts egy oldalt, ahol a felhasználók listázódnak, és a felhasználók mellett van egy gomb, amivel a prémium
státusz megváltoztatható az adott felhasználóhoz!
- Lapozással biztosítsd, hogy egyszerre csak 10 felhasználó jelenjen meg!

### Védésre szerezhető pontszám (4 pont)

- További 4 pont szerezhető a védés során mutatott **általános jártasságra** a témában.
- Nem várjuk el senkitől, hogy másfél-két hónap alatt mesterévé váljon a Laravel lelki világának; viszont azt igen, hogy a **saját projektjét** alapvetően tudja navigálni és a **gyakorlaton lefedett** ismeretekkel kapcsolatos kiegészítő kérdésekre tudjon értékelhetően válaszolni. Normál esetben a védés 10-15 percnél tovább nem tart.
- **Amennyiben a hallgató a szóbeli védés során teljes tájékozatlanságot mutat, az egész beadandó feladat visszautasítható csalás gyanújával!**
- Ha a gyakorlatvezető valamilyen okból nem tud védést szervezni, akkor az eddig elért pontszámmal arányosan kell meg kell adni a védésre járó pontokra.