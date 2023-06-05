<?php

return [
    'attributes' => [
        'size' => 'taille',
        'time' => 'heure',
        'first_name' => 'prénom',
        'gender' => 'genre',
        'hour' => 'heure',
        'last_name' => 'nom',
        'minute' => 'minute',
        'mobile' => 'portable',
        'month' => 'mois',
        'name' => 'nom',
        'password' => 'mot de passe',
        'password_confirmation' => 'confirmation du mot de passe',
        'title' => 'titre',
        'username' => 'nom d\'utilisateur',
        'year' => 'année',
        'username_email' => 'nom d\'utilisateur ou email',
        'email' => 'adresse email',
        'excerpt' => 'extrait',
        'sex' => 'sexe',
        'second' => 'seconde',
        'address' => 'adresse',
        'available' => 'disponible',
        'city' => 'ville',
        'content' => 'contenu',
        'country' => 'pays',
        'current_password' => 'mot de passe actuel',
        'date' => 'date',
        'day' => 'jour',
        'description' => 'description',
        'phone' => 'numéro de téléphone',
        'age' => 'âge',
        'role_id' => 'role',
        'primary_phone_number' => 'numéro de téléphone principal',
        'secondary_phone_number' => 'numéro de téléphone secondaire',
    ],
    'between' => [
        'array' => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
        'file' => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.',
        'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
        'string' => 'Le texte :attribute doit contenir entre :min et :max caractères.',
    ],
    'confirmed' => 'Le champ de confirmation :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'dimensions' => 'La taille de l\'image :attribute n\'est pas conforme.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'phone' => 'Le champ :attribute doit être un numéro de téléphone valide valide (243......).',
    'ends_with' => 'Le champ :attribute doit se terminer par une des valeurs suivantes : :values',
    'exists' => 'Le champ :attribute sélectionné est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'Le tableau :attribute doit contenir plus de :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être supérieure à :value kilo-octets.',
        'numeric' => 'La valeur de :attribute doit être supérieure à :value.',
        'string' => 'Le texte :attribute doit contenir plus de :value caractères.',
    ],
    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date postérieure au :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale au :date.',
    'alpha' => 'Le champ :attribute doit contenir uniquement des lettres.',
    'alpha_dash' => 'Le champ :attribute doit contenir uniquement des lettres, des chiffres et des tirets.',
    'alpha_num' => 'Le champ :attribute doit contenir uniquement des chiffres et des lettres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'attached' => ':attribute est déjà attaché(e).',
    'before' => 'Le champ :attribute doit être une date antérieure au :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale au :date.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Les champs :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between' => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'lt' => [
        'array' => 'Le tableau :attribute doit contenir moins de :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être inférieure à :value kilo-octets.',
        'numeric' => 'La valeur de :attribute doit être inférieure à :value.',
        'string' => 'Le texte :attribute doit contenir moins de :value caractères.',
    ],
    'lte' => [
        'array' => 'Le tableau :attribute doit contenir au plus :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être inférieure ou égale à :value kilo-octets.',
        'numeric' => 'La valeur de :attribute doit être inférieure ou égale à :value.',
        'string' => 'Le texte :attribute doit contenir au plus :value caractères.',
    ],
    'max' => [
        'array' => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
        'file' => 'La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.',
        'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
        'string' => 'Le texte :attribute ne peut contenir plus de :max caractères.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type : :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type : :values.',
    'min' => [
        'array' => 'Le tableau :attribute doit contenir au moins :min éléments.',
        'file' => 'La taille du fichier de :attribute doit être supérieure à :min kilo-octets.',
        'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :min.',
        'string' => 'Le texte :attribute doit contenir au moins :min caractères.',
    ],
    'not_regex' => 'Le format du champ :attribute n\'est pas valide.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique' => 'La valeur du champ :attribute est déjà utilisée.',
    'uploaded' => 'Le fichier du champ :attribute n\'a pu être téléversé.',
    'url' => 'Le format de l\'URL de :attribute n\'est pas valide.',
    'multiple_of' => 'La valeur de :attribute doit être un multiple de :value',
    'not_in' => 'Le champ :attribute sélectionné n\'est pas valide.',
    'gte' => [
        'array' => 'Le tableau :attribute doit contenir au moins :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être supérieure ou égale à :value kilo-octets.',
        'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :value.',
        'string' => 'Le texte :attribute doit contenir au moins :value caractères.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être un document JSON valide.',
    'in' => 'Le champ :attribute est invalide.',
    'size' => [
        'numeric' => 'La valeur de :attribute doit être :size.',
        'string' => 'Le texte de :attribute doit contenir :size caractères.',
        'array' => 'Le tableau :attribute doit contenir :size éléments.',
        'file' => 'La taille du fichier de :attribute doit être de :size kilo-octets.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer avec une des valeurs suivantes : :values',
    'string' => 'Le champ :attribute doit être une chaîne de caractères.',
    'numeric' => 'Le champ :attribute doit contenir un nombre.',
    'password' => 'Le mot de passe est incorrect',
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit quand :other a la valeur :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit à moins que :other est l\'une des valeurs :values.',
    'regex' => 'Le format du champ :attribute est invalide.',
    'relatable' => ':attribute n\'est sans doute pas associé(e) avec cette donnée.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_if' => 'Le champ :attribute est obligatoire quand la valeur de :other est :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est :values.',
    'required_with' => 'Le champ :attribute est obligatoire quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire quand :values sont présents.',
    'uuid' => 'Le champ :attribute doit être un UUID valide',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'required_without' => 'Le champ :attribute est obligatoire quand :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis quand aucun de :values n\'est présent.',
    'same' => 'Les champs :attribute et :other doivent être identiques.',
];
