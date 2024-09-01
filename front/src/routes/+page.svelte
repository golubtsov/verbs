<script lang="ts">
	import axios from 'axios';

	const url: string = 'http://90.156.252.224/api/verbs';

	let verbs: string[] = [];
	let v2: string = '';
	let v3: string = '';

	let v2Error: boolean = false;
	let v3Error: boolean = false;
	let isStarting: boolean = false;

	async function senRequest(url: string) {
		if (!isStarting) {
			isStarting = true;
		}

		clearAll();
		const response = await axios.get(url);
		for (const key in response.data.verbs) {
			const elem: string = response.data.verbs[key];
			verbs = [...verbs, elem];
		}
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

		senRequest(url);
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
				on:click={() => senRequest(url)}
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
						placeholder="V2" />
				</div>
			</div>

			<div class="mt-4">
				<div>
					<input
						bind:value="{v3}"
						type="text"
						class="input"
						placeholder="V3" />
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
