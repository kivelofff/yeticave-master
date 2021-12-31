<?php
/**
 *   @var $title string lot name
 *  @var $URL string lot image
 * @var $category string lot category
 * @var $description string lot description
 *  @var $price int start price
 *  @var $price_step int step of the price
 * @var $errors array errors array
 *
 */
?>
<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item">
            <a href="all-lots.html">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Разное</a>
        </li>
    </ul>
</nav>
<form class="form form--add-lot container form--invalid" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="<?php echo isset($errors['title'])?'form__item form__item--invalid':'form__item'?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$title??''?>" required>
            <span class="form__error"><?=$errors['title']??''?></span>
        </div>
        <div class="form__item">
            <label for="category">Категория</label>
            <select id="category" name="category" value="<?=$category??''?>"required>
                <option>Выберите категорию</option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <span class="form__error"><?=$errors['category']??''?></span>
        </div>
    </div>
    <div class="form__item form__item--wide">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"required><?=$description??''?></textarea>
        <span class="form__error"><?=$errors['description']?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="" type="file" id="photo2">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
            <span class="form__error"><?=$errors['URL']??''?></span>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$price??''?>" required>
            <span class="form__error"><?=$errors['price']??''?></span>
        </div>
        <div class="form__item form__item--small">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$price_step??''?>"required>
            <span class="form__error"><?=$errors['price_step']??''?></span>
        </div>
        <div class="form__item">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom"><?php echo empty($errors)?'':'Пожалуйста, исправьте ошибки в форме.'?></span>
    <button type="submit" class="button">Добавить лот</button>
</form>
