<?php
// Submitted via @rtxanson 
// To add new swearwords, make sure to include some additional
// wordforms.
//
// Existing words could always have more forms, but I was too lazy to
// generate all of them, so this is a start; in no particular
// order...
array_push($badwords,
		'jumalauta',     // goddamnit, interjection
		'helvetit',      // hell, pl. nominative
		'helvetiltä',    // hell, sg. ablative
		'helvetillä',    // hell, sg. adessive
		'helvetille',    // hell, sg. allative
		'helvetistä',    // hell, sg. elative
		'helvetin',      // hell, sg. genitive
		'helvettiin',    // hell, sg. illative
		'helvetissä',    // hell, sg. inessive
		'helvetti',      // hell, sg. nominative
		'helvettiä',     // hell, sg. partitive
		'helveteiltä',   // hell, pl. ablative
		'helveteillä',   // hell, pl. adessive
		'helveteille',   // hell, pl. allative
		'helveteistä',   // hell, pl. elative
		'helvettien',    // hell, pl. genitive
		'helvetteihin',  // hell, pl. illative
		'helveteissä',   // hell, pl. inessive
		'helvetit',      // hell, pl. nominative
		'helvettejä',    // hell, pl. partitive
		'hinttarit',     // faggot, pl. nominative
		'hinttarilta',   // faggot, sg. ablative
		'hinttarilla',   // faggot, sg. adessive
		'hinttarille',   // faggot, sg. allative
		'hinttarista',   // faggot, sg. elative
		'hinttarin',     // faggot, sg. genitive
		'hinttariin',    // faggot, sg. illative
		'hinttarissa',   // faggot, sg. inessive
		'hinttari',      // faggot, sg. nominative
		'hinttaria',     // faggot, sg. partitive
		'hinttareilta',  // faggot, pl. ablative
		'hinttareilla',  // faggot, pl. adessive
		'hinttareille',  // faggot, pl. allative
		'hinttareista',  // faggot, pl. elative
		'hinttarien',    // faggot, pl. genitive
		'hinttareiden',  // faggot, pl. genitive
		'hinttareitten', // faggot, pl. genitive
		'hinttareihin',  // faggot, pl. illative
		'hinttareissa',  // faggot, pl. inessive
		'hinttarit',     // faggot, pl. nominative
		'hinttareita',   // faggot, pl. partitive
		'hinttareja',    // faggot, pl. partitive
		'hintit',        // fag, pl. nominative
		'hintiltä',      // fag, sg. ablative
		'hintillä',      // fag, sg. adessive
		'hintille',      // fag, sg. allative
		'hintistä',      // fag, sg. elative
		'hintin',        // fag, sg. genitive
		'hinttiin',      // fag, sg. illative
		'hintissä',      // fag, sg. inessive
		'hintti',        // fag, sg. nominative
		'hinttiä',       // fag, sg. partitive
		'hinteiltä',     // fag, pl. ablative
		'hinteillä',     // fag, pl. adessive
		'hinteille',     // fag, pl. allative
		'hinteistä',     // fag, pl. elative
		'hinttien',      // fag, pl. genitive
		'hintteihin',    // fag, pl. illative
		'hinteissä',     // fag, pl. inessive
		'hintit',        // fag, pl. nominative
		'hinttejä',      // fag, pl. partitive
		'huorat',        // whore, pl. nominative
		'huoralta',      // whore, sg. ablative
		'huoralla',      // whore, sg. adessive
		'huoralle',      // whore, sg. allative
		'huorasta',      // whore, sg. elative
		'huoran',        // whore, sg. genitive
		'huoraan',       // whore, sg. illative
		'huorassa',      // whore, sg. inessive
		'huora',         // whore, sg. nominative
		'huoraa',        // whore, sg. partitive
		'huorilta',      // whore, pl. ablative
		'huorilla',      // whore, pl. adessive
		'huorille',      // whore, pl. allative
		'huorista',      // whore, pl. elative
		'huorien',       // whore, pl. genitive
		'huoriin',       // whore, pl. illative
		'huorissa',      // whore, pl. inessive
		'huorat',        // whore, pl. nominative
		'huoria',        // whore, pl. partitive
		'kusipäät',      // pisshead, pl. nominative
		'kusipäältä',    // pisshead, sg. ablative
		'kusipäällä',    // pisshead, sg. adessive
		'kusipäälle',    // pisshead, sg. allative
		'kusipäästä',    // pisshead, sg. elative
		'kusipään',      // pisshead, sg. genitive
		'kusipäähän',    // pisshead, sg. illative
		'kusipäässä',    // pisshead, sg. inessive
		'kusipää',       // pisshead, sg. nominative
		'kusipäätä',     // pisshead, sg. partitive
		'kusipäiltä',    // pisshead, pl. ablative
		'kusipäillä',    // pisshead, pl. adessive
		'kusipäille',    // pisshead, pl. allative
		'kusipäistä',    // pisshead, pl. elative
		'kusipäitten',   // pisshead, pl. genitive
		'kusipäihin',    // pisshead, pl. illative
		'kusipäissä',    // pisshead, pl. inessive
		'kusipäät',      // pisshead, pl. nominative
		'kusipäitä',     // pisshead, pl. partitive
		'kyrvät',        // cock, pl. nominative
		'kyrvältä',      // cock, sg. ablative
		'kyrvällä',      // cock, sg. adessive
		'kyrvälle',      // cock, sg. allative
		'kyrvästä',      // cock, sg. elative
		'kyrvän',        // cock, sg. genitive
		'kyrpään',       // cock, sg. illative
		'kyrvässä',      // cock, sg. inessive
		'kyrpä',         // cock, sg. nominative
		'kyrpää',        // cock, sg. partitive
		'kyrviltä',      // cock, pl. ablative
		'kyrvillä',      // cock, pl. adessive
		'kyrville',      // cock, pl. allative
		'kyrvistä',      // cock, pl. elative
		'kyrpien',       // cock, pl. genitive
		'kyrpiin',       // cock, pl. illative
		'kyrvissä',      // cock, pl. inessive
		'kyrvät',        // cock, pl. nominative
		'kyrpiä',        // cock, pl. partitive
		'mulkut',        // dick, pl. nominative
		'mulkulta',      // dick, sg. ablative
		'mulkulla',      // dick, sg. adessive
		'mulkulle',      // dick, sg. allative
		'mulkusta',      // dick, sg. elative
		'mulkun',        // dick, sg. genitive
		'mulkkuun',      // dick, sg. illative
		'mulkussa',      // dick, sg. inessive
		'mulkku',        // dick, sg. nominative
		'mulkkua',       // dick, sg. partitive
		'mulkuilta',     // dick, pl. ablative
		'mulkuilla',     // dick, pl. adessive
		'mulkuille',     // dick, pl. allative
		'mulkuista',     // dick, pl. elative
		'mulkkujen',     // dick, pl. genitive
		'mulkkuihin',    // dick, pl. illative
		'mulkuissa',     // dick, pl. inessive
		'mulkut',        // dick, pl. nominative
		'mulkkuja',      // dick, pl. partitive
		'nartut',        // bitch, pl. nominative
		'nartulta',      // bitch, sg. ablative
		'nartulla',      // bitch, sg. adessive
		'nartulle',      // bitch, sg. allative
		'nartusta',      // bitch, sg. elative
		'nartun',        // bitch, sg. genitive
		'narttuun',      // bitch, sg. illative
		'nartussa',      // bitch, sg. inessive
		'narttu',        // bitch, sg. nominative
		'narttua',       // bitch, sg. partitive
		'nartuilta',     // bitch, pl. ablative
		'nartuilla',     // bitch, pl. adessive
		'nartuille',     // bitch, pl. allative
		'nartuista',     // bitch, pl. elative
		'narttujen',     // bitch, pl. genitive
		'narttuihin',    // bitch, pl. illative
		'nartuissa',     // bitch, pl. inessive
		'nartut',        // bitch, pl. nominative
		'narttuja',      // bitch, pl. partitive
		'neekerit',      // nigger, pl. nominative
		'neekeriltä',    // nigger, sg. ablative
		'neekerillä',    // nigger, sg. adessive
		'neekerille',    // nigger, sg. allative
		'neekeristä',    // nigger, sg. elative
		'neekerin',      // nigger, sg. genitive
		'neekeriin',     // nigger, sg. illative
		'neekerissä',    // nigger, sg. inessive
		'neekeri',       // nigger, sg. nominative
		'neekeriä',      // nigger, sg. partitive
		'neekereiltä',   // nigger, pl. ablative
		'neekereillä',   // nigger, pl. adessive
		'neekereille',   // nigger, pl. allative
		'neekereistä',   // nigger, pl. elative
		'neekerien',     // nigger, pl. genitive
		'neekereitten',  // nigger, pl. genitive
		'neekereiden',   // nigger, pl. genitive
		'neekereihin',   // nigger, pl. illative
		'neekereissä',   // nigger, pl. inessive
		'neekerit',      // nigger, pl. nominative
		'neekereitä',    // nigger, pl. partitive
		'neekerejä',     // nigger, pl. partitive
		'paskat',        // shit, pl. nominative
		'paskalta',      // shit, sg. ablative
		'paskalla',      // shit, sg. adessive
		'paskalle',      // shit, sg. allative
		'paskasta',      // shit, sg. elative
		'paskan',        // shit, sg. genitive
		'paskaan',       // shit, sg. illative
		'paskassa',      // shit, sg. inessive
		'paska',         // shit, sg. nominative
		'paskaa',        // shit, sg. partitive
		'paskoilta',     // shit, pl. ablative
		'paskoilla',     // shit, pl. adessive
		'paskoille',     // shit, pl. allative
		'paskoista',     // shit, pl. elative
		'paskojen',      // shit, pl. genitive
		'paskoihin',     // shit, pl. illative
		'paskoissa',     // shit, pl. inessive
		'paskat',        // shit, pl. nominative
		'paskoja',       // shit, pl. partitive
		'perhanat',      // deuce, pl. nominative
		'perhanalta',    // deuce, sg. ablative
		'perhanalla',    // deuce, sg. adessive
		'perhanalle',    // deuce, sg. allative
		'perhanasta',    // deuce, sg. elative
		'perhanan',      // deuce, sg. genitive
		'perhanaan',     // deuce, sg. illative
		'perhanassa',    // deuce, sg. inessive
		'perhana',       // deuce, sg. nominative
		'perhanaa',      // deuce, sg. partitive
		'perhanoilta',   // deuce, pl. ablative
		'perhanoilla',   // deuce, pl. adessive
		'perhanoille',   // deuce, pl. allative
		'perhanoista',   // deuce, pl. elative
		'perhanoiden',   // deuce, pl. genitive
		'perhanoitten',  // deuce, pl. genitive
		'perhanoihin',   // deuce, pl. illative
		'perhanoissa',   // deuce, pl. inessive
		'perhanat',      // deuce, pl. nominative
		'perhanoita',    // deuce, pl. partitive
		'perkeleet',     // devil, pl. nominative
		'perkeleeltä',   // devil, sg. ablative
		'perkeleellä',   // devil, sg. adessive
		'perkeleelle',   // devil, sg. allative
		'perkeleestä',   // devil, sg. elative
		'perkeleen',     // devil, sg. genitive
		'perkeleeseen',  // devil, sg. illative
		'perkeleessä',   // devil, sg. inessive
		'perkele',       // devil, sg. nominative
		'perkelettä',    // devil, sg. partitive
		'perkeleiltä',   // devil, pl. ablative
		'perkeleillä',   // devil, pl. adessive
		'perkeleille',   // devil, pl. allative
		'perkeleistä',   // devil, pl. elative
		'perkeleitten',  // devil, pl. genitive
		'perkeleiden',   // devil, pl. genitive
		'perkeleihin',   // devil, pl. illative
		'perkeleisiin',  // devil, pl. illative
		'perkeleissä',   // devil, pl. inessive
		'perkeleet',     // devil, pl. nominative
		'perkeleitä',    // devil, pl. partitive
		'perseet',       // ass, pl. nominative
		'perseeltä',     // ass, sg. ablative
		'perseellä',     // ass, sg. adessive
		'perseelle',     // ass, sg. allative
		'perseestä',     // ass, sg. elative
		'perseen',       // ass, sg. genitive
		'perseeseen',    // ass, sg. illative
		'perseessä',     // ass, sg. inessive
		'perse',         // ass, sg. nominative
		'persettä',      // ass, sg. partitive
		'perseiltä',     // ass, pl. ablative
		'perseillä',     // ass, pl. adessive
		'perseille',     // ass, pl. allative
		'perseistä',     // ass, pl. elative
		'perseitten',    // ass, pl. genitive
		'perseiden',     // ass, pl. genitive
		'perseihin',     // ass, pl. illative
		'perseisiin',    // ass, pl. illative
		'perseissä',     // ass, pl. inessive
		'perseet',       // ass, pl. nominative
		'perseitä',      // ass, pl. partitive
		'pillut',        // pussy, pl. nominative
		'pillulta',      // pussy, sg. ablative
		'pillulla',      // pussy, sg. adessive
		'pillulle',      // pussy, sg. allative
		'pillusta',      // pussy, sg. elative
		'pillun',        // pussy, sg. genitive
		'pilluun',       // pussy, sg. illative
		'pillussa',      // pussy, sg. inessive
		'pillu',         // pussy, sg. nominative
		'pillua',        // pussy, sg. partitive
		'pilluilta',     // pussy, pl. ablative
		'pilluilla',     // pussy, pl. adessive
		'pilluille',     // pussy, pl. allative
		'pilluista',     // pussy, pl. elative
		'pillujen',      // pussy, pl. genitive
		'pilluihin',     // pussy, pl. illative
		'pilluissa',     // pussy, pl. inessive
		'pillut',        // pussy, pl. nominative
		'pilluja',       // pussy, pl. partitive
		'saamarit',      // bloody, pl. nominative
		'saamarilta',    // bloody, sg. ablative
		'saamarilla',    // bloody, sg. adessive
		'saamarille',    // bloody, sg. allative
		'saamarista',    // bloody, sg. elative
		'saamarin',      // bloody, sg. genitive
		'saamariin',     // bloody, sg. illative
		'saamarissa',    // bloody, sg. inessive
		'saamari',       // bloody, sg. nominative
		'saamaria',      // bloody, sg. partitive
		'saamareilta',   // bloody, pl. ablative
		'saamareilla',   // bloody, pl. adessive
		'saamareille',   // bloody, pl. allative
		'saamareista',   // bloody, pl. elative
		'saamarien',     // bloody, pl. genitive
		'saamareiden',   // bloody, pl. genitive
		'saamareitten',  // bloody, pl. genitive
		'saamareihin',   // bloody, pl. illative
		'saamareissa',   // bloody, pl. inessive
		'saamarit',      // bloody, pl. nominative
		'saamareita',    // bloody, pl. partitive
		'saamareja',     // bloody, pl. partitive
		'saatanat',      // satan, pl. nominative
		'saatanalta',    // satan, sg. ablative
		'saatanalla',    // satan, sg. adessive
		'saatanalle',    // satan, sg. allative
		'saatanasta',    // satan, sg. elative
		'saatanan',      // satan, sg. genitive
		'saatanaan',     // satan, sg. illative
		'saatanassa',    // satan, sg. inessive
		'saatana',       // satan, sg. nominative
		'saatanaa',      // satan, sg. partitive
		'saatanoilta',   // satan, pl. ablative
		'saatanoilla',   // satan, pl. adessive
		'saatanoille',   // satan, pl. allative
		'saatanoista',   // satan, pl. elative
		'saatanoiden',   // satan, pl. genitive
		'saatanoitten',  // satan, pl. genitive
		'saatanoihin',   // satan, pl. illative
		'saatanoissa',   // satan, pl. inessive
		'saatanat',      // satan, pl. nominative
		'saatanoita',    // satan, pl. partitive
		'vittu',         // cunt, interjection, sg. nominative
		'vitut',         // cunt, pl. nominative
		'vitulta',       // cunt, sg. ablative
		'vitulla',       // cunt, sg. adessive
		'vitulle',       // cunt, sg. allative
		'vitusta',       // cunt, sg. elative
		'vitun',         // cunt, sg. genitive
		'vittuun',       // cunt, sg. illative
		'vitussa',       // cunt, sg. inessive
		'vittua',        // cunt, sg. partitive
		'vituilta',      // cunt, pl. ablative
		'vituilla',      // cunt, pl. adessive
		'vituille',      // cunt, pl. allative
		'vituista',      // cunt, pl. elative
		'vittujen',      // cunt, pl. genitive
		'vittuihin',     // cunt, pl. illative
		'vituissa',      // cunt, pl. inessive
		'vitut',         // cunt, pl. nominative
		'vittuja',       // cunt, pl. partitive
		'ämmät',         // hag, bitch; pl. nominative
		'ämmältä',       // hag, bitch; sg. ablative
		'ämmällä',       // hag, bitch; sg. adessive
		'ämmälle',       // hag, bitch; sg. allative
		'ämmästä',       // hag, bitch; sg. elative
		'ämmän',         // hag, bitch; sg. genitive
		'ämmään',        // hag, bitch; sg. illative
		'ämmässä',       // hag, bitch; sg. inessive
		'ämmä',          // hag, bitch; sg. nominative
		'ämmää',         // hag, bitch; sg. partitive
		'ämmiltä',       // hag, bitch; pl. ablative
		'ämmillä',       // hag, bitch; pl. adessive
		'ämmille',       // hag, bitch; pl. allative
		'ämmistä',       // hag, bitch; pl. elative
		'ämmien',        // hag, bitch; pl. genitive
		'ämmiin',        // hag, bitch; pl. illative
		'ämmissä',       // hag, bitch; pl. inessive
		'ämmät',         // hag, bitch; pl. nominative
		'ämmiä',         // hag, bitch; pl. partitive
		'fittu',         // cunt (f- version); interjection, sg. nominative
		'fitut',         // cunt (f- version); pl. nominative
		'fitulta',       // cunt (f- version); sg. ablative
		'fitulla',       // cunt (f- version); sg. adessive
		'fitulle',       // cunt (f- version); sg. allative
		'fitusta',       // cunt (f- version); sg. elative
		'fitun',         // cunt (f- version); sg. genitive
		'fittuun',       // cunt (f- version); sg. illative
		'fitussa',       // cunt (f- version); sg. inessive
		'fittua',        // cunt (f- version); sg. partitive
		'fituilta',      // cunt (f- version); pl. ablative
		'fituilla',      // cunt (f- version); pl. adessive
		'fituille',      // cunt (f- version); pl. allative
		'fituista',      // cunt (f- version); pl. elative
		'fittujen',      // cunt (f- version); pl. genitive
		'fittuihin',     // cunt (f- version); pl. illative
		'fituissa',      // cunt (f- version); pl. inessive
		'fitut',         // cunt (f- version); pl. nominative
		'fittuja',       // cunt (f- version); pl. partitive
		'fiddu',         // cunt (fidd- version); interjection, sg. nominative
		'fiddut',        // cunt (fidd- version); pl. nominative
		'fiddulta',      // cunt (fidd- version); sg. ablative
		'fiddulla',      // cunt (fidd- version); sg. adessive
		'fiddulle',      // cunt (fidd- version); sg. allative
		'fiddusta',      // cunt (fidd- version); sg. elative
		'fiddun',        // cunt (fidd- version); sg. genitive
		'fidduun',       // cunt (fidd- version); sg. illative
		'fiddussa',      // cunt (fidd- version); sg. inessive
		'fiddua',        // cunt (fidd- version); sg. partitive
		'fidduilta',     // cunt (fidd- version); pl. ablative
		'fidduilla',     // cunt (fidd- version); pl. adessive
		'fidduille',     // cunt (fidd- version); pl. allative
		'fidduista',     // cunt (fidd- version); pl. elative
		'fiddujen',      // cunt (fidd- version); pl. genitive
		'fidduihin',     // cunt (fidd- version); pl. illative
		'fidduissa',     // cunt (fidd- version); pl. inessive
		'fiddut',        // cunt (fidd- version); pl. nominative
		'fidduja',       // cunt (fidd- version); pl. partitive
		'horo',          // whore; interjection, sg. nominative
		'horot',         // whore; pl. nominative
		'horolta',       // whore; sg. ablative
		'horolla',       // whore; sg. adessive
		'horolle',       // whore; sg. allative
		'horosta',       // whore; sg. elative
		'horon',         // whore; sg. genitive
		'horoon',        // whore; sg. illative
		'horossa',       // whore; sg. inessive
		'horoa',         // whore; sg. partitive
		'horoilta',      // whore; pl. ablative
		'horoilla',      // whore; pl. adessive
		'horoille',      // whore; pl. allative
		'horoista',      // whore; pl. elative
		'horojen',       // whore; pl. genitive
		'horoihin',      // whore; pl. illative
		'horoissa',      // whore; pl. inessive
		'horot',         // whore; pl. nominative
		'horoja'        // whore; pl. partitive
);