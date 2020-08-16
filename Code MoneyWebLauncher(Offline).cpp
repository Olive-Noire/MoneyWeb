#include <string>

int main()
{

    std::string ProgramPath = __argv[0];

    while (ProgramPath[ProgramPath.size() - 1] != '\\') ProgramPath.pop_back();

    std::string FilePath = ProgramPath.append("\\main\\Offline(Version)\\MoneyWeb(Offline).html");

    system(("start " + FilePath).c_str());

    return 0;
}