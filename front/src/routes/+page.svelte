<script lang="ts">
    export const VERBS = [
        ['be', 'was/were', 'been'],
        ['begin', 'began', 'begun'],
        ['break', 'broke', 'broken'],
        ['bring', 'brought', 'brought'],
        ['build', 'built', 'built'],
        ['burn', 'burnt', 'burnt'],
        ['buy', 'bought', 'bought'],
        ['can', 'could', 'been able to'],
        ['catch', 'caught', 'caught'],
        ['choose', 'chose', 'chosen'],
        ['come', 'came', 'come'],
        ['cost', 'cost', 'cost'],
        ['cut', 'cut', 'cut'],
        ['do', 'did', 'done'],
        ['dream', 'dreamt', 'dreamt'],
        ['drink', 'drank', 'drunk'],
        ['drive', 'drove', 'driven'],
        ['eat', 'ate', 'eaten'],
        ['fall', 'fell', 'fallen'],
        ['feel', 'felt', 'felt'],
        ['fight', 'fought', 'fought'],
        ['fly', 'flew', 'flown'],
        ['forget', 'forgot', 'forgotten'],
        ['get', 'got', 'got'],
        ['give', 'gave', 'given'],
        ['go', 'went', 'gone'],
        ['have', 'had', 'had'],
        ['hear', 'heard', 'heard'],
        ['know', 'knew', 'known'],
        ['learn', 'learnt', 'learnt'],
        ['leave', 'left', 'left'],
        ['lose', 'lost', 'lost'],
        ['make', 'made', 'made'],
        ['must', 'had to', 'had to'],
        ['pay', 'paid', 'paid'],
        ['put', 'put', 'put'],
        ['read', 'read', 'read'],
        ['say', 'said', 'said'],
        ['see', 'saw', 'seen'],
        ['show', 'showed', 'shown'],
        ['sing', 'sang', 'sung'],
        ['sleep', 'slept', 'slept'],
        ['speak', 'spoke', 'spoken'],
        ['spend', 'spent', 'spent'],
        ['take', 'took', 'taken'],
        ['teach', 'taught', 'taught'],
        ['think', 'thought', 'thought'],
        ['understand', 'understood', 'understood'],
        ['win', 'won', 'won']
    ];

    let verbs: string[] = [];
    let v2: string = '';
    let v3: string = '';

    let v2Error: boolean = false;
    let v3Error: boolean = false;
    let isStarting: boolean = false;

    function getRandomVerb() {
        let n = Math.floor(Math.random() * (VERBS.length + 1));
        return VERBS[n];
    }

    function start() {
        if (!isStarting) {
            isStarting = true;
        }
        clearAll();
        verbs = getRandomVerb();
    }

    function check() {
        if (v2 === verbs[1] && v3 === verbs[2]) {
            alert('Good!');
        } else {

            if (v2 !== verbs[1] && v3 === verbs[2]) {
                v2Error = true;
            }

            if (v2 === verbs[1] && v3 !== verbs[2]) {
                v3Error = true;
            }

            if (v2 !== verbs[1] && v3 !== verbs[2]) {
                v2Error = true;
                v3Error = true;
            }

            alert(v2 + ' - ' + verbs[1] + '\n' + v3 + ' - ' + verbs[2]);
        }

        start();
    }

    function clearAll() {
        verbs = [];
        v2 = '';
        v3 = '';
        v2Error = false;
        v3Error = false;
    }
</script>

<section class="flex flex-1 mt-36 absolute border-2 shadow-2xl rounded-2xl w-full p-5 min-h-[200px]">

    {#if verbs.length === 0 && !isStarting}
        <div class="flex w-full m-auto p-2">
            <button
                    class="flex m-auto py-1 border-2 text-2xl rounded-2xl px-4"
                    on:click={() => start()}
            >
                Verbs
            </button>
        </div>
    {/if}

    {#if verbs.length !== 0}
        <div class="block m-auto w-full">

            <div class="block w-full text-center text-2xl">
                <p>{verbs[0]}</p>
            </div>

            <div class="mt-4">
                <div>
                    <input
                            bind:value="{v2}"
                            type="text"
                            class="input"
                            placeholder="V2"/>
                </div>
            </div>

            <div class="mt-4">
                <div>
                    <input
                            bind:value="{v3}"
                            type="text"
                            class="input"
                            placeholder="V3"/>
                </div>
            </div>

            <div class="block w-full mt-4">
                <button
                        on:click={check}
                        class="btn rounded-2xl"
                >
                    Check
                </button>
            </div>
        </div>
    {/if}
</section>

<style>
</style>
