<div class="contact__container">
    <h2 class="contact__title">{{ __('Imate dodatna pitanja?') }}</h2>
    <div class="contact__description">{{ __('Za sva pitanja o ovom studiskom programu ili Akademiji u cjelini molimo vas da koristite ovaj link:') }}</div>
    <form class="contact__form">
        <div class="contact__form-input-container">
            <label for="name" class="contact__form-label">{{ __('Ime') }}</label>
            <input type="text" class="contact__form-input" id="contact__form-name" maxlength="50" placeholder="{{ __('Tvoje ime...') }}" />
        </div>
        <div class="contact__form-input-container">
            <label for="contact__form-surname" class="contact__form-label">{{ __('Prezime') }}</label>
            <input type="text" class="contact__form-input" id="contact__form-surname" maxlength="50" placeholder="{{ __('Tvoje prezime...') }}" />
        </div>
        <div class="contact__form-input-container">
            <label for="contact__form-email" class="contact__form-label">{{ __('Mail') }}</label>
            <input type="email" class="contact__form-input" id="contact__form-email" maxlength="50" placeholder="{{ __('Tvoja email adresa...') }}" />
        </div>
        <div class="contact__form-input-container">
            <label for="contact__form-program" class="contact__form-label">{{ __('Program') }}</label>
            <select class="contact__form-input" id="contact__form-program">
                <option value="Pisanje za 21. stoljeće">{{ __('Pisanje za 21. stoljeće') }}</option>
                <option value="Novinarstvo i društvene mreže">{{ __('Novinarstvo i društvene mreže') }}</option>
                <option value="Primijenjena muzička produkcija">{{ __('Primijenjena muzička produkcija') }}</option>
                <option value="Odgovorno kodiranje i Civic Tech">{{ __('Odgovorno kodiranje i Civic Tech') }}</option>
                <option value="Grafički dizajn i animacija">{{ __('Grafički dizajn i animacija') }}</option>
                <option value="Angažovani rad  i kritičko razmišljanje">{{ __('Angažovani rad  i kritičko razmišljanje') }}</option>
            </select>
        </div>
        <div class="contact__form-input-container contact__form-input-container-2">
            <label for="contact__form-message" class="contact__form-label">{{ __('Poruka') }}</label>
            <textarea class="contact__form-textarea" id="contact__form-message" maxlength="600" placeholder="{{ __('Tvoja poruka...') }}"></textarea>
        </div>

        <button class="contact__form-button">{{ __('Pošalji') }}</button>
    </form>
</div>
