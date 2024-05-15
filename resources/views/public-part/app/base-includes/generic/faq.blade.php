<div class="faq">
    <div class="faq__container">
        <h2 class="faq__title">{{ __('FAQs') }}</h2>
        <p class="faq__description">{{ __('Saznajte odgovore na najčešća pitanja vezana za Helem Nejse Talent Akademiju.') }}</p>
        <div class="faq__list">
            @foreach($faqs as $faq)
                <div class="faq__list-item">
                    <div class="faq__list-item-question">
                        {{ $faq->title }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none" class="faq--rotate-svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5303 21.5157C16.2374 21.8086 15.7626 21.8086 15.4697 21.5157L7.82318 13.8692C7.53029 13.5763 7.53029 13.1015 7.82318 12.8086L8.17674 12.455C8.46963 12.1621 8.9445 12.1621 9.2374 12.455L16 19.2176L22.7626 12.455C23.0555 12.1621 23.5303 12.1621 23.8232 12.455L24.1768 12.8086C24.4697 13.1015 24.4697 13.5763 24.1768 13.8692L16.5303 21.5157Z" fill="#070600"/>
                        </svg>
                    </div>
                    <div class="faq__list-item-answer">
                        {!! nl2br($faq->description) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
