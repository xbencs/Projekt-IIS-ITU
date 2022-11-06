
# Studentské turnaje

Úkolem zadání je vytvořit jednoduchý informační systém pro pořádání sportovních turnajů ve studentském klubu (šachy, šipky, PC hry, konzumace piva, apod…) mezi jednotlivci nebo týmy vyřazovacím herním stylem pavouk. Každý turnaj má nějaké označení, pomocí kterého ho uživatelé systému budou moci vhodně odlišit a další atributy (např. datum, popis, výherní cena, apod.). Dále stanovuje podmínky, za jakých podmínek se mohou turnajů účastnit jednotlivci nebo týmy - např. počet týmů, počet hráčů týmu apod. Každý tým má vlastní název a volitelně logo (např. vlajku). Uživatelé budou moci informační systém použít jak pro registraci na turnaj, tak tvorbu a správu turnajů nových, správu týmů a účastníků turnaje - a to následujícím způsobem:
* administrátor:
    * spravuje uživatele
    * schvaluje turnaje
* registrovaný uživatel:
    * edituje svůj profil
    * zakládá týmy - stává se správcem týmu
        * přidává uživatele do týmu, kteří stávají se členy týmu
        * registruje svůj tým na turnaj
    * zakládá turnaj - stává se správcem turnaje
        * zadává parametry turnaje
        * schvaluje hráče turnaje (jednotlivce/týmy dle typu turnaje)
        * spouští turnaj, generuje harmonogram turnaje (ručně nebo automaticky - rozlosování)
        * zadává výsledky zápasů (výsledek zápasu uvažujte jako dvojici (počet bodů týmu/hráče 1, počet bodů týmu/hráče 2))
    * účastní se turnaje (registruje se jako jednotlivec nebo je členem registrovaného týmu) - stává se hráčem turnaje
        * vidí svůj program (harmonogram zápasů)
        * přednostně vidí výsledky svých zápasů
    * neregistrovaný:
        * prochází profily a statistiky hráčů, týmů a turnajů s výsledky


### Pouzite technologie

* [![Laravel][Laravel.com]][Laravel-url]


[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
