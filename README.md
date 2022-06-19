# CloudyForum

**CloudyForum** jest aplikacją internetową przedstawiającą prosty forum.

# Opis

## Rejestracja

![Rejestracja](/imgs/register.png)
Na stronie rejestracji użytkownik ma możliwość wypełnienia formularza składającego się z następujących elementów:

> **email** - Pola dla poczty elektronicznej użytkownika. Jeżeli użytkownik o podanym adresie email już istnieje w
> bazie, to zostanie wyświetlony komunikat:

```
 Given email already exists!
```

> **username** - Pole dla nazwy użytkownika. Jeżeli użytkownik o podanej nazwie już istnieje w bazie, to zostanie
> wyświetlony komunikat:

```
Given username already exists!
```

> **password** - Pole dla hasła użytkownika.

> Jeżeli chociaż jedno z powyższych pól nie zostanie wypełnione, to zostanie wyświetlony komunikat:

```
Please fill in blanks!
```

Jeżeli użytkownik podał poprawne dane, po naciśnięciu przycisku `Register` zostanie dodany do systemu i przekierowany na
stronę logowania wraz z następującym komunikatem:

```
You have registered successfully, please log in
```

Jeśli użytkownik posiada konto, po naciśnięciu `Login` zostanie przekierowany bezpośrednio na stronę logowania.

## Logowanie

![Logowanie](/imgs/login.png)
Na stronie logowania użytkownik ma możliwość wypełnienia formularza składającego się z następujących elementów:

> **username** - Pole dla nazwy użytkownika. Jeżeli użytkownik o podanej nazwie już istnieje w bazie, to zostanie
> wyświetlony komunikat:

```
User with this username does not exist!
```

> **password** - Pole dla podania hasła użytkownika. Jeżeli użytkownik wprowadzi błędne hasło, to zostanie wyświetlony
> komunikat:

```
Wrong password!
```

> Jeżeli chociaż jedno z powyższych pól nie zostanie wypełnione, to zostanie wyświetlony komunikat:

```
Please fill in blanks!
```

Jeżeli użytkownik podał poprawne dane, po naciśnięciu przycisku `Login` zostanie przekierowany na stronę z zadaniami.

## Strona z tematami / Topics

![Tematy](/imgs/topics.png)
Na stronie tematów użytkownik ma możliwość:

- Dodawania tematów
- Usuwania swoich tematów z listy
- Przejścia do konkretnego tematu

## Strona z komentarzami dla poszczególnych tematów

![Komentarze](/imgs/topic.png)
Na stronie tematu użytkownik ma możliwość:

- Dodawania komentarzy

> Dodane komentarze posiadają również nazwę użytkownika, który dodał komentarz oraz date i czas dodania.