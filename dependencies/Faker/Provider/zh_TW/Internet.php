<?php

namespace Beer_List\Dependencies\Faker\Provider\zh_TW;

/**
 * @deprecated Use {@link \Beer_List\Dependencies\Faker\Provider\Internet} instead
 * @see \Beer_List\Dependencies\Faker\Provider\Internet
 */
class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    /**
     * @deprecated Use {@link \Beer_List\Dependencies\Faker\Provider\Internet::userName()} instead
     * @see \Beer_List\Dependencies\Faker\Provider\Internet::userName()
     */
    public function userName()
    {
        return parent::userName();
    }

    /**
     * @deprecated Use {@link \Beer_List\Dependencies\Faker\Provider\Internet::domainWord()} instead
     * @see \Beer_List\Dependencies\Faker\Provider\Internet::domainWord()
     */
    public function domainWord()
    {
        return parent::domainWord();
    }
}
