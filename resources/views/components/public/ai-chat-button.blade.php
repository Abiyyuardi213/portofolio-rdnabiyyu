{{-- Floating AI Assistant Widget Button --}}
<div class="fixed bottom-6 right-6 z-50 flex items-center group">
    {{-- Tooltip Label on Hover --}}
    <span class="mr-3 px-3.5 py-1.5 rounded-full bg-slate-900/90 backdrop-blur-md text-white text-xs font-semibold shadow-lg opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200 pointer-events-none whitespace-nowrap hidden sm:inline-block border border-white/10 font-sans">
        Chat dengan AI Assistant
    </span>

    {{-- Circular Floating Button --}}
    <button type="button" 
            id="openAiModalBtn"
            onclick="toggleAiTerminalModal(true)"
            class="relative w-14 h-14 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center text-xl shadow-2xl shadow-blue-600/40 hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none"
            aria-label="Chat dengan AI Assistant">
        
        {{-- Pulse Glow Effect --}}
        <span class="absolute inset-0 rounded-full bg-blue-500 animate-ping opacity-25 pointer-events-none"></span>

        {{-- Online Status Dot --}}
        <span class="absolute top-1 right-1 w-3.5 h-3.5 rounded-full bg-emerald-500 border-2 border-white shadow-xs"></span>

        {{-- Icon Sparkle --}}
        <i class="fas fa-wand-magic-sparkles text-lg"></i>
    </button>
</div>

{{-- Modal Dialog: Apple macOS Terminal Autentik --}}
<div id="aiTerminalModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-black/50 backdrop-blur-md transition-opacity duration-300">
    
    {{-- Window Frame macOS (SF Mono / Menlo style, 1px border translucent, shadow-2xl) --}}
    <div class="relative w-full max-w-2xl bg-[#1e1e1e]/95 backdrop-blur-2xl border border-white/15 rounded-xl shadow-[0_25px_70px_rgba(0,0,0,0.65)] overflow-hidden flex flex-col h-[560px] max-h-[90vh] text-[#f5f5f7]"
         style="font-family: 'SF Mono', 'Menlo', 'Monaco', 'Courier New', monospace;">
        
        {{-- macOS Titlebar (Vibrancy Gray) --}}
        <div class="h-10 px-4 flex items-center justify-between bg-[#2d2d2d]/90 border-b border-black/40 select-none relative">
            
            {{-- Apple Traffic Lights dengan icon simbol hover --}}
            <div class="flex items-center gap-2 group/lights z-10">
                {{-- Close (Merah) --}}
                <button type="button" onclick="toggleAiTerminalModal(false)" 
                        class="w-3 h-3 rounded-full bg-[#ff5f56] border border-[#e0443e] flex items-center justify-center text-[8px] text-black/0 group-hover/lights:text-black/70 transition-colors focus:outline-none"
                        title="Tutup (Esc)">
                    <span class="leading-none">&times;</span>
                </button>
                {{-- Minimize / Clear (Kuning) --}}
                <button type="button" onclick="clearAiTerminal()" 
                        class="w-3 h-3 rounded-full bg-[#ffbd2e] border border-[#dea123] flex items-center justify-center text-[8px] text-black/0 group-hover/lights:text-black/70 transition-colors focus:outline-none"
                        title="Bersihkan Layar">
                    <span class="leading-none">&minus;</span>
                </button>
                {{-- Zoom (Hijau) --}}
                <button type="button" class="w-3 h-3 rounded-full bg-[#27c93f] border border-[#1aab29] flex items-center justify-center text-[7px] text-black/0 group-hover/lights:text-black/70 transition-colors focus:outline-none cursor-default">
                    <span class="leading-none">&#x2B;</span>
                </button>
            </div>

            {{-- Centered macOS Window Title --}}
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="flex items-center gap-2 text-xs font-medium text-[#b3b3b3]">
                    <i class="fas fa-folder text-[11px] text-[#808080]"></i>
                    <span>abiyyu — -zsh — 80&times;24</span>
                </div>
            </div>

            {{-- Right Status Pill --}}
            <div class="flex items-center gap-1.5 text-[10px] text-[#34c759] font-medium z-10">
                <span class="w-1.5 h-1.5 rounded-full bg-[#34c759] animate-pulse"></span>
                <span>Active</span>
            </div>
        </div>

        {{-- Terminal Body (macOS Terminal Dark Canvas) --}}
        <div id="terminalBody" class="flex-1 p-4 sm:p-5 overflow-y-auto space-y-4 text-xs sm:text-[13px] leading-[1.65] bg-[#181818]/95 scroll-smooth text-[#e5e5e7]">
            
            {{-- Apple Terminal Shell Header --}}
            <div class="space-y-1 text-[#86868b] text-[11px] pb-2 border-b border-white/5">
                <p>Last login: {{ date('D M j H:i:s') }} on ttys002</p>
                <p class="text-[#0a84ff]">Apple Silicon Darwin Kernel Version 24.3.0: AbiyyuDev-Engine</p>
                <p class="text-[#a1a1a6]">Ketik pertanyaan Anda tentang Abiyyu atau pilih pintasan berikut:</p>
            </div>

            {{-- Quick Suggestion Pills (macOS Tag style) --}}
            <div id="quickPromptContainer" class="flex flex-wrap gap-1.5 pt-1">
                <button type="button" onclick="sendQuickPrompt('Siapa itu Abiyyu dan apa profesinya?')" 
                        class="px-2.5 py-1 rounded-md bg-[#2c2c2e] hover:bg-[#3a3a3c] text-[#64d2ff] border border-white/10 text-[11px] transition-all text-left">
                    ❯ profil-ringkas
                </button>
                <button type="button" onclick="sendQuickPrompt('Apa saja pekerjaan abiyyu yang remote?')" 
                        class="px-2.5 py-1 rounded-md bg-[#2c2c2e] hover:bg-[#3a3a3c] text-[#30d158] border border-white/10 text-[11px] transition-all text-left">
                    ❯ remote-jobs
                </button>
                <button type="button" onclick="sendQuickPrompt('Apa saja proyek yang pernah dibuat Abiyyu?')" 
                        class="px-2.5 py-1 rounded-md bg-[#2c2c2e] hover:bg-[#3a3a3c] text-[#ffd60a] border border-white/10 text-[11px] transition-all text-left">
                    ❯ show-projects
                </button>
                <button type="button" onclick="sendQuickPrompt('Bagaimana cara menghubungi Abiyyu melalui WhatsApp?')" 
                        class="px-2.5 py-1 rounded-md bg-[#2c2c2e] hover:bg-[#3a3a3c] text-[#ff9f0a] border border-white/10 text-[11px] transition-all text-left">
                    ❯ contact-wa
                </button>
            </div>

            {{-- Initial AI Prompt --}}
            <div class="space-y-1">
                <div class="flex items-center gap-1.5 text-xs text-[#30d158] font-bold">
                    <span class="text-[#64d2ff]">abiyyu@macbook-pro</span>
                    <span class="text-white">:</span>
                    <span class="text-[#ffd60a]">~</span>
                    <span class="text-white">$</span>
                    <span class="text-[#98989d] font-normal">ai-assistant --welcome</span>
                </div>
                <div class="pl-2 text-[#d1d1d6] leading-relaxed">
                    Halo! Saya asisten virtual resmi <strong class="text-white">R. Abiyyu Ardi Lian Permadi</strong>. Saya siap menjawab detail keahlian Fullstack &amp; Project Management, riwayat karir 13 posisi industri, kampus ITATS, hingga koleksi 9 proyek rilis.
                </div>
            </div>

            {{-- Chat Stream Container --}}
            <div id="chatStream" class="space-y-4"></div>

            {{-- macOS Activity Indicator --}}
            <div id="aiLoadingIndicator" class="hidden items-center gap-2.5 text-[#86868b] text-xs pl-2">
                <i class="fas fa-spinner fa-spin text-[#0a84ff]"></i>
                <span class="text-[11px]">Memproses query dan menyusun jawaban...</span>
            </div>
        </div>

        {{-- macOS Terminal Prompt Input --}}
        <div class="p-3 bg-[#242426] border-t border-black/40">
            <form id="aiChatForm" onsubmit="handleAiChatSubmit(event)" class="flex items-center gap-2">
                @csrf
                <div class="flex items-center gap-1.5 text-xs text-[#30d158] font-bold select-none pl-1">
                    <span class="text-[#64d2ff] hidden sm:inline">guest@mac</span><span class="text-white hidden sm:inline">:</span><span class="text-[#ffd60a] hidden sm:inline">~</span><span class="text-white">$</span>
                </div>
                <input type="text" 
                       id="aiChatInput" 
                       placeholder="Ketik pertanyaan... (tekan Return untuk kirim)" 
                       class="flex-1 bg-transparent border-0 text-[#f5f5f7] placeholder-[#636366] text-xs sm:text-[13px] focus:outline-none focus:ring-0 px-1" 
                       style="font-family: inherit;"
                       autocomplete="off" required>
                <button type="submit" 
                        class="px-3.5 py-1.5 rounded-lg bg-[#0071e3] hover:bg-[#0077ed] text-white text-xs font-semibold transition-all shadow-sm flex items-center gap-1.5">
                    <span>Send</span>
                    <span class="text-[10px] text-white/70">↵</span>
                </button>
            </form>
        </div>

    </div>
</div>

<script>
    function toggleAiTerminalModal(show) {
        const modal = document.getElementById('aiTerminalModal');
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                document.getElementById('aiChatInput').focus();
            }, 100);
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    function clearAiTerminal() {
        document.getElementById('chatStream').innerHTML = '';
        document.getElementById('aiChatInput').value = '';
    }

    function sendQuickPrompt(promptText) {
        const input = document.getElementById('aiChatInput');
        input.value = promptText;
        document.getElementById('aiChatForm').dispatchEvent(new Event('submit'));
    }

    async function handleAiChatSubmit(e) {
        e.preventDefault();
        const input = document.getElementById('aiChatInput');
        const userMsg = input.value.trim();
        if (!userMsg) return;

        // Command: exit / quit / :q / close (Menutup Terminal macOS)
        if (['exit', 'quit', ':q', 'close', 'logout'].includes(userMsg.toLowerCase())) {
            const chatStream = document.getElementById('chatStream');
            const terminalBody = document.getElementById('terminalBody');
            
            const exitMsg = document.createElement('div');
            exitMsg.className = 'space-y-1';
            exitMsg.innerHTML = `
                <div class="flex items-center gap-1.5 text-xs font-bold text-[#64d2ff]">
                    <span>guest@mac</span><span class="text-white">:</span><span class="text-[#ffd60a]">~</span><span class="text-white">$</span>
                    <span class="text-white font-normal">${escapeHtml(userMsg)}</span>
                </div>
                <div class="pl-2 text-[#86868b] text-xs">Saving session... completed. Closing terminal window...</div>
            `;
            chatStream.appendChild(exitMsg);
            input.value = '';
            terminalBody.scrollTop = terminalBody.scrollHeight;

            setTimeout(() => {
                toggleAiTerminalModal(false);
            }, 600);
            return;
        }

        // Command: clear (Membersihkan Layar Terminal)
        if (['clear', 'cls'].includes(userMsg.toLowerCase())) {
            clearAiTerminal();
            return;
        }

        const chatStream = document.getElementById('chatStream');
        const terminalBody = document.getElementById('terminalBody');
        const loader = document.getElementById('aiLoadingIndicator');

        // User Entry (macOS Terminal prompt styling)
        const userElement = document.createElement('div');
        userElement.className = 'space-y-1';
        userElement.innerHTML = `
            <div class="flex items-center gap-1.5 text-xs font-bold text-[#64d2ff]">
                <span>guest@mac</span><span class="text-white">:</span><span class="text-[#ffd60a]">~</span><span class="text-white">$</span>
                <span class="text-white font-normal">${escapeHtml(userMsg)}</span>
            </div>
        `;
        chatStream.appendChild(userElement);
        input.value = '';

        // Show Loader & Scroll
        loader.classList.remove('hidden');
        loader.classList.add('flex');
        terminalBody.scrollTop = terminalBody.scrollHeight;

        try {
            const token = document.querySelector('input[name="_token"]')?.value || '{{ csrf_token() }}';
            const response = await fetch('{{ route("ai.chat") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ message: userMsg })
            });

            const data = await response.json();
            loader.classList.add('hidden');
            loader.classList.remove('flex');

            const formattedReply = parseMarkdownToHtml(data.reply || 'Tidak dapat memproses jawaban.');

            const aiElement = document.createElement('div');
            aiElement.className = 'space-y-1 pl-2';
            aiElement.innerHTML = `
                <div class="text-[#30d158] text-[11px] font-bold">
                    ➜ abiyyu-ai response:
                </div>
                <div class="text-[#e5e5e7] leading-relaxed whitespace-pre-wrap">${formattedReply}</div>
            `;
            chatStream.appendChild(aiElement);

        } catch (error) {
            loader.classList.add('hidden');
            loader.classList.remove('flex');
            const errorElement = document.createElement('div');
            errorElement.className = 'pl-2 text-[#ff453a] text-xs';
            errorElement.textContent = 'zsh: command failed / connection error';
            chatStream.appendChild(errorElement);
        }

        terminalBody.scrollTop = terminalBody.scrollHeight;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function parseMarkdownToHtml(text) {
        let out = escapeHtml(text);
        out = out.replace(/\*\*(.*?)\*\*/g, '<strong class="text-white font-bold">$1</strong>');
        out = out.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" class="text-[#64d2ff] underline hover:text-[#9fe5ff] font-medium">$1</a>');
        return out;
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            toggleAiTerminalModal(false);
        }
    });
</script>
