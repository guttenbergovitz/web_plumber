{
  description = "web_plumber — internet plumbing since the tubes were copper";

  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs/nixpkgs-unstable";
  };

  outputs = { self, nixpkgs }: let
    system = "aarch64-darwin";
    pkgs = nixpkgs.legacyPackages.${system};
    shell = import ./shell.nix { inherit pkgs; };
  in {
    devShells.${system}.default = shell;
    packages.${system}.default = shell;
  };
}
