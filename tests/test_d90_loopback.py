from pathlib import Path
import unittest
import yaml


class CvLoopback(unittest.TestCase):
    def test_publication_is_local_and_container_port_is_unchanged(self):
        root = Path(__file__).resolve().parents[1]
        services = yaml.safe_load((root / "docker-compose.yml").read_text(encoding="utf-8"))["services"]
        self.assertEqual(services["app"]["ports"], ["127.0.0.1:9081:80"])


if __name__ == "__main__":
    unittest.main()
