" После внесения изменений в конфиг
" :so %
" :PlugInstall
" :so %
set mouse=a
set encoding=utf-8
set noswapfile

set tabstop=4
set softtabstop=4
set shiftwidth=4

call plug#begin('~/.vim/plugged')

Plug 'tpope/vim-sensible'
Plug 'junegunn/seoul256.vim'

Plug 'morhetz/gruvbox'

call plug#end()

colorscheme gruvbox