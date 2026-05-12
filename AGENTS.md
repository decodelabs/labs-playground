# AGENTS.md

- These repos are container-first. Work through Effigy, not the host shell.
- Use `effigy workspace` to open the repo workspace shell.
- Use `effigy exec ...` for one-off commands, for example:
  - `effigy exec composer install`
  - `effigy exec pnpm install`
  - `effigy exec vendor/bin/phpstan analyse -c phpstan.neon`
  - `effigy exec pnpm build`
- `composer` and `pnpm` are only available inside the container.
- `vendor/` and `node_modules/` are volume mounts. Editing them on the host has no effect.
- Change source and config in the repo. Treat `vendor/` and `node_modules/` as generated runtime state.
- Run Effigy from the repo root. From elsewhere, use `--repo /path/to/repo`.
